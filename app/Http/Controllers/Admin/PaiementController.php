<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Paiement;
use App\Models\Propriete;
use App\Mail\MessageGoogle;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Mail\RecuPaiementMail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\AcceptPaiementMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaiementController extends Controller
{
    /**
     * Liste tous les paiements.
     */
    public function index()
    {
        $paiements = Paiement::with('user', 'propriete')->latest()->get();
        return view('agence.paiements.index', compact('paiements'));
    }

    public function show($id) {}

    /**
     * Effectuer un paiement (achat ou location) et notifier l'agence et le client.
     */
    public function store(Request $request)
    {
        $request->validate([
            'propriete_id' => 'required|exists:proprietes,id',
            'type_transaction' => 'required|in:achat,location',
            'montant' => 'required|numeric',
            'frequence' => 'nullable|in:par mois,par an',
            'duree' => 'nullable|integer|min:1',
            'telephone' => 'required|string|regex:/^[0-9]{8}$/',
            'unite_duree' => 'nullable|in:mois,ans',
        ]);

        $client = Auth::user();
        if (!$client || $client->type != 2) {
            return redirect()->route('client.login')->withErrors('Veuillez vous connecter en tant que client.');
        }

        $propriete = Propriete::findOrFail($request->propriete_id);
        if (!$propriete->disponible) {
            return back()->withErrors('Cette propriété n’est plus disponible.');
        }

        $montant = $request->montant;
        $date_fin_location = null;

        if ($request->type_transaction === 'location') {
            $duree = (int) $request->duree;
            $unite = $request->unite_duree ?? 'mois';
            $frequence = $request->frequence ?? 'par mois';
            $dureeEnMois = $unite === 'ans' ? $duree * 12 : $duree;

            $montant = $frequence === 'par an'
                ? $propriete->prix * ($dureeEnMois / 12)
                : $propriete->prix * $dureeEnMois;

            $date_fin_location = Carbon::now()->addMonths($dureeEnMois);
        }

        // Création du paiement
        $paiement = Paiement::create([
            'propriete_id' => $propriete->id,
            'user_id' => $client->id,
            'agence_id' => $propriete->agence_id,
            'montant' => $montant,
            'type' => $request->type_transaction,
            'frequence' => $request->frequence,
            'duree' => $request->duree,
            'unite_duree' => $request->unite_duree,
            'telephone' => $request->telephone,
            'status' => 'en_attente',
            'date_paiement' => now(),
            'date_fin_location' => $date_fin_location,
            'reference_transaction' => 'TX' . strtoupper(uniqid()),
        ]);

        // Mettre la propriété en attente
        $propriete->statut = 'en_attente';
        $propriete->save();

        // Notifications côté agence
        Notification::create([
            'titre' => $request->type_transaction === 'achat' ? 'Nouvel achat' : 'Nouvelle location',
            'contenu' => $request->type_transaction === 'achat'
                ? "{$client->name} {$client->prenom} a acheté la propriété : {$propriete->nom}."
                : "{$client->name} {$client->prenom} a loué la propriété : {$propriete->nom} pour {$request->duree} {$request->unite_duree}.",
            'lu' => false,
            'notifiable_id' => $propriete->agence_id,
            'notifiable_type' => User::class,
            'paiement_id' => $paiement->id,
        ]);

        // Notifications côté client
        if ($client) {
            Notification::create([
                'titre' => 'Paiement enregistré',
                'contenu' => "Votre paiement pour la propriété '{$propriete->nom}' a été enregistré et attend la validation de l'agence.",
                'lu' => false,
                'notifiable_id' => $client->id,
                'notifiable_type' => User::class,
                'paiement_id' => $paiement->id,
            ]);
        }

        return back()->with('success', ucfirst($request->type_transaction) . ' enregistrée avec succès. En attente de validation.');
    }

    /**
     * Supprimer un paiement.
     */
    public function destroy($id)
    {
        $paiement = Paiement::findOrFail($id);

        if ($paiement->agence_id !== Auth::id()) {
            abort(403, "Accès non autorisé.");
        }

        $paiement->delete();

        return back()->with('success', 'Paiement supprimé avec succès.');
    }

    /**
     * Valider un paiement côté agence.
     */
    /**
     * Valider un paiement côté agence.
     */
    public function valider(Paiement $paiement)
    {
        if ($paiement->agence_id !== Auth::id()) {
            abort(403, "Accès non autorisé.");
        }

        // 1. Mettre à jour le statut du paiement
        $paiement->status = 'paye';
        $paiement->save();

        // 2. Mettre à jour la propriété associée
        $propriete = $paiement->propriete;
        if (!$propriete) {
            return back()->withErrors("Propriété associée non trouvée.");
        }

        $propriete->statut = $paiement->type === 'achat' ? 'vendu' : 'louee';
        $propriete->disponible = false;
        $propriete->save();

        // 3. Envoi du reçu par email
        if ($paiement->user && $paiement->user->email) {
            try {
                Mail::to($paiement->user->email)->send(new RecuPaiementMail($paiement));
            } catch (\Exception $e) {
                return back()->with('error', 'Paiement validé, mais le reçu n’a pas pu être envoyé : ' . $e->getMessage());
            }
        }

        // 4. Créer une notification côté client
        if ($paiement->user) {
            Notification::create([
                'titre' => 'Paiement validé',
                'contenu' => "Votre paiement pour la propriété '{$propriete->nom}' a été validé. 
                          <a href='" . route('paiements.recu', $paiement->id) . "'>Voir le reçu</a>.",
                'lu' => false,
                'notifiable_id' => $paiement->user->id,
                'notifiable_type' => User::class,
                'paiement_id' => $paiement->id,
            ]);
        }

        return back()->with('success', 'Paiement validé et reçu envoyé au client.');
    }

    /**
     * Refuser un paiement côté agence.
     */
    public function refuser(Paiement $paiement)
    {
        if ($paiement->agence_id !== Auth::id()) abort(403, "Accès non autorisé.");

        $paiement->status = 'refuse';
        $paiement->save();

        $propriete = $paiement->propriete;
        if ($propriete) {
            $propriete->statut = 'disponible';
            $propriete->disponible = true;
            $propriete->save();
        }

        if ($paiement->user) {
            Notification::create([
                'titre' => 'Paiement refusé',
                'contenu' => "Votre paiement pour la propriété '{$propriete->nom}' a été refusé par l'agence.",
                'lu' => false,
                'notifiable_id' => $paiement->user->id,
                'notifiable_type' => User::class,
                'paiement_id' => $paiement->id,
            ]);
        }

        return back()->with('success', 'Paiement refusé et notification envoyée au client.');
    }

    /**
     * Afficher le reçu pour le client.
     */
    public function recu(Paiement $paiement)
    {
        $client = Auth::user();
        if ($paiement->user_id !== $client->id) {
            abort(403, "Accès non autorisé au reçu.");
        }

        return view('client.paiements.recu', compact('paiement'));
    }

    /**
     * Générer et télécharger le PDF du reçu.
     */
    public function recuPdf(Paiement $paiement)
    {
        $client = Auth::user();
        if ($paiement->user_id !== $client->id) {
            abort(403, "Accès non autorisé au PDF.");
        }

        $pdf = Pdf::loadView('client.paiements.recu_pdf', compact('paiement'));
        $filename = 'recu_' . $paiement->reference_transaction . '.pdf';

        return $pdf->download($filename);
    }
    public function annuler($id)
    {
        $paiement = Paiement::findOrFail($id);

        // On remet le paiement en attente
        $paiement->status = 'en_attente';
        $paiement->save();

        return redirect()->back()->with('success', 'Le paiement a été remis en attente.');
    }
    public function adminIndex()
    {
        // Récupère tous les paiements avec les relations
        $paiements = Paiement::with('user', 'propriete', 'agence')
            ->latest()
            ->get();

        // Retourne la vue admin avec les paiements
        return view('admin.paiements.index', compact('paiements'));
    }


    /**
     * Acheter et créer un paiement pour achat.
     */
    public function acheterPayer(Request $request, $id)
    {
        $request->validate([
            'telephone' => 'required|string|regex:/^[0-9]{8}$/',
        ]);

        $client = Auth::user();
        if (!$client || $client->type != 2) {
            return back()->withErrors('Vous devez être connecté en tant que client.');
        }

        $propriete = Propriete::findOrFail($id);
        if (!$propriete->disponible) {
            return back()->withErrors('Cette propriété n’est plus disponible.');
        }

        $paiement = Paiement::create([
            'propriete_id' => $propriete->id,
            'user_id' => $client->id,
            'agence_id' => $propriete->agence_id,
            'montant' => $propriete->prix,
            'type' => 'achat',
            'telephone' => $request->telephone,
            'status' => 'en_attente',
            'date_paiement' => now(),
            'reference_transaction' => 'TX' . strtoupper(uniqid()),
        ]);

        $propriete->statut = 'en_attente';
        $propriete->save();

        Notification::create([
            'titre' => 'Nouvel achat',
            'contenu' => "{$client->name} {$client->prenom} a acheté la propriété : {$propriete->nom}.",
            'lu' => false,
            'notifiable_id' => $propriete->agence_id,
            'notifiable_type' => User::class,
            'paiement_id' => $paiement->id,
        ]);

        Notification::create([
            'titre' => 'Paiement enregistré',
            'contenu' => "Votre paiement pour la propriété '{$propriete->nom}' a été enregistré et attend la validation de l'agence.",
            'lu' => false,
            'notifiable_id' => $client->id,
            'notifiable_type' => User::class,
            'paiement_id' => $paiement->id,
        ]);

        return back()->with('success', 'Achat enregistré avec succès. En attente de validation.');
    }

    /**
     * Louer et créer un paiement pour location.
     */
    public function louerPayer(Request $request, $id)
    {
        $request->validate([
            'telephone' => 'required|string|regex:/^[0-9]{8}$/',
            'duree' => 'required|integer|min:1',
            'unite_duree' => 'required|in:mois,ans',
            'frequence' => 'required|in:par mois,par an',
        ]);

        $client = Auth::user();
        if (!$client || $client->type != 2) {
            return back()->withErrors('Vous devez être connecté en tant que client.');
        }

        $propriete = Propriete::findOrFail($id);
        if (!$propriete->disponible) {
            return back()->withErrors('Cette propriété n’est plus disponible.');
        }

        $duree = (int) $request->duree;
        $unite = $request->unite_duree;
        $dureeEnMois = $unite === 'ans' ? $duree * 12 : $duree;

        $montant = $request->frequence === 'par an'
            ? $propriete->prix * ($dureeEnMois / 12)
            : $propriete->prix * $dureeEnMois;

        $date_fin_location = Carbon::now()->addMonths($dureeEnMois);

        $paiement = Paiement::create([
            'propriete_id' => $propriete->id,
            'user_id' => $client->id,
            'agence_id' => $propriete->agence_id,
            'montant' => $montant,
            'type' => 'location',
            'frequence' => $request->frequence,
            'duree' => $duree,
            'unite_duree' => $unite,
            'telephone' => $request->telephone,
            'status' => 'en_attente',
            'date_paiement' => now(),
            'date_fin_location' => $date_fin_location,
            'reference_transaction' => 'TX' . strtoupper(uniqid()),
        ]);

        $propriete->statut = 'en_attente';
        $propriete->save();

        Notification::create([
            'titre' => 'Nouvelle location',
            'contenu' => "{$client->name} {$client->prenom} a loué la propriété : {$propriete->nom} pour {$duree} {$unite}.",
            'lu' => false,
            'notifiable_id' => $propriete->agence_id,
            'notifiable_type' => User::class,
            'paiement_id' => $paiement->id,
        ]);

        Notification::create([
            'titre' => 'Paiement enregistré',
            'contenu' => "Votre paiement pour la propriété '{$propriete->nom}' a été enregistré et attend la validation de l'agence.",
            'lu' => false,
            'notifiable_id' => $client->id,
            'notifiable_type' => User::class,
            'paiement_id' => $paiement->id,
        ]);

        return back()->with('success', 'Location enregistrée avec succès. En attente de validation.');
    }

    public function validerP($id)
    {
        $paiement = Paiement::find($id);
        $paiement->status = "paye";
        $data = [
            'nom' => $paiement->user->name,
            'prenom' => $paiement->user->prenom,
        ];

        Mail::to($paiement->user->email)->queue(new AcceptPaiementMail($data));
        $paiement->save();
        return redirect('agence/transactions');
    }
}
