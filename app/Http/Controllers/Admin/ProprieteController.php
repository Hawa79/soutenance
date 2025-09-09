<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Propriete;
use App\Models\Notification;
use App\Models\ImagePropriete;
use App\Models\Paiement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProprieteController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            toastr()->error('Veuillez vous connecter.');
            return redirect()->route('login');
        }

        $agence_id = Auth::id();

        $proprietes = Propriete::with('images')
            ->where('agence_id', $agence_id)
            ->get();

        return view('agence.propriete.index', compact('proprietes'));
    }

    public function create()
    {
        if (!Auth::check()) {
            toastr()->error('Veuillez vous connecter.');
            return redirect()->route('login');
        }

        return view('agence.propriete.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            toastr()->error('Veuillez vous connecter.');
            return redirect()->route('login');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'pays' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'quartier' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'nombre_de_chambres' => 'required|integer|min:1',
            'salle_de_bains' => 'required|integer|min:1',
            'annee_de_construction' => 'required|integer|min:1800|max:' . date('Y'),
            'prix' => 'required|integer|min:0',
            'type_transaction' => 'required|string|in:location,vente',
            'image.*' => 'nullable|image|max:2048'
        ]);

        // ✅ statut initial corrigé
        $statutInitial = 'disponible';

        $propriete = Propriete::create([
            'agence_id' => Auth::id(),
            'nom' => $request->nom,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'pays' => $request->pays,
            'ville' => $request->ville,
            'quartier' => $request->quartier,
            'type' => $request->type,
            'nombre_de_chambres' => $request->nombre_de_chambres,
            'salle_de_bains' => $request->salle_de_bains,
            'annee_de_construction' => $request->annee_de_construction,
            'prix' => $request->prix,
            'type_transaction' => $request->type_transaction,
            'statut' => $statutInitial,
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('proprietes', 'public');

                ImagePropriete::create([
                    'propriete_id' => $propriete->id,
                    'image' => $imagePath,
                ]);
            }
        }

        toastr()->success('Propriété ajoutée avec succès.');
        return redirect()->route('agence.propriete.index');
    }

    public function show($id)
    {
        $propriete = Propriete::with('images')->findOrFail($id);
        return view('propriete.show', compact('propriete'));
    }

    public function edit($id)
    {
        if (!Auth::check()) {
            toastr()->error('Veuillez vous connecter.');
            return redirect()->route('login');
        }

        $propriete = Propriete::where('id', $id)
            ->where('agence_id', Auth::id())
            ->firstOrFail();

        return view('agence.propriete.edit', compact('propriete'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            toastr()->error('Veuillez vous connecter.');
            return redirect()->route('login');
        }

        $propriete = Propriete::where('id', $id)
            ->where('agence_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'nom' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'adresse' => 'sometimes|string',
            'pays' => 'sometimes|string',
            'ville' => 'sometimes|string',
            'quartier' => 'sometimes|string',
            'type' => 'sometimes|string',
            'nombre_de_chambres' => 'sometimes|integer|min:0',
            'salle_de_bains' => 'sometimes|integer|min:0',
            'annee_de_construction' => 'sometimes|digits:4|integer|min:1800',
            'prix' => 'sometimes|numeric|min:0',
            'statut' => 'sometimes|in:en_attente,disponible,deja_loue,deja_achete',
            'image.*' => 'nullable|image|max:2048'
        ]);

        $propriete->update($validated);

        if ($request->hasFile('image')) {
            foreach ($propriete->images as $image) {
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }

            foreach ($request->file('image') as $image) {
                $imagePath = $image->store('proprietes/images', 'public');

                ImagePropriete::create([
                    'propriete_id' => $propriete->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('agence.propriete.index')
            ->with('success', 'Propriété mise à jour avec succès.');
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            toastr()->error('Veuillez vous connecter.');
            return redirect()->route('login');
        }

        $propriete = Propriete::where('id', $id)
            ->where('agence_id', Auth::id())
            ->firstOrFail();

        foreach ($propriete->images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }

        $propriete->delete();

        return redirect()->route('agence.propriete.index')
            ->with('success', 'Propriété supprimée avec succès.');
    }

    public function toutesLesProprietes()
    {
        $proprietes = Propriete::with('agence', 'categorie')
            ->latest()
            ->get();

        return view('proprietes.index', compact('proprietes'));
    }

    public function indexLocationVente()
    {
        $proprietes = Propriete::with('images', 'agence')
            ->get();

        return view('propriete.locationVente.index', compact('proprietes'));
    }

    public function payerAchat(Request $request, $id)
    {
        $propriete = Propriete::findOrFail($id);
        $client = auth()->user();

        if ($propriete->statut !== 'disponible' || $propriete->type_transaction !== 'vente') {
            return redirect()->back()->with('error', 'Cette propriété n’est plus disponible à l’achat.');
        }

        $request->validate([
            'telephone' => 'required|string|max:20',
        ]);

        $montant = $propriete->prix;

        Paiement::create([
            'client_id' => $client->id,
            'propriete_id' => $propriete->id,
            'agence_id' => $propriete->agence_id,
            'montant' => $montant,
            'type' => 'achat',
            'status' => 'payé',
            'telephone' => $request->telephone,
            'date_paiement' => now(),
        ]);

        Notification::create([
            'notifiable_id' => $propriete->agence_id,
            'notifiable_type' => User::class,
            'titre' => 'Achat en attente',
            'contenu' => "{$client->name} a payé pour la propriété : {$propriete->nom}. En attente de validation.",
            'lu' => false,
        ]);

        $propriete->statut = 'en_attente';
        $propriete->save();

        return redirect()->back()->with('success', '✅ Paiement effectué ! La propriété est en attente de validation par l’agence.');
    }

    public function show1($id)
    {
        $propriete = Propriete::findOrFail($id);
        return view('agence.propriete.show1', compact('propriete'));
    }

    public function payerLocation(Request $request, $id)
    {
        $propriete = Propriete::findOrFail($id);
        $client = auth()->user();

        if ($propriete->statut !== 'disponible' || $propriete->type_transaction !== 'location') {
            return redirect()->back()->with('error', 'Cette propriété n’est plus disponible à la location.');
        }

        $request->validate([
            'duree' => 'required|integer|min:1',
            'frequence' => 'required|in:mensuel,annuel',
            'telephone' => 'required|string|max:20',
        ]);

        $montant = $request->frequence === 'annuel'
            ? $propriete->prix * $request->duree
            : ($propriete->prix / 12) * $request->duree;

        Paiement::create([
            'client_id' => $client->id,
            'propriete_id' => $propriete->id,
            'agence_id' => $propriete->agence_id,
            'montant' => $montant,
            'type' => 'location',
            'frequence' => $request->frequence,
            'duree' => $request->duree,
            'status' => 'payé',
            'telephone' => $request->telephone,
            'date_paiement' => now(),
        ]);

        Notification::create([
            'notifiable_id' => $propriete->agence_id,
            'notifiable_type' => User::class,
            'titre' => 'Location en attente',
            'contenu' => "{$client->name} a payé pour louer la propriété : {$propriete->nom} pour {$request->duree} {$request->frequence}(s).",
            'lu' => false,
        ]);

        $propriete->statut = 'en_attente';
        $propriete->disponible = false;
        $propriete->save();

        return redirect()->back()->with('success', '✅ Paiement pour location effectué ! La propriété est en attente de validation par l’agence.');
    }
}
