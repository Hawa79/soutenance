<?php

namespace App\Http\Controllers\Agence;

use App\Models\User;
use App\Models\Agence;
use App\Models\Paiement;
use App\Models\Propriete;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Admin\NotificationController;

class AgenceController extends Controller
{
    // ... tes autres méthodes inchangées ...

    /**
     * Ajouter une propriété (exemple)
     */
    public function ajouterPropriete(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'ville' => 'required|string',
            'type' => 'required|string',
        ]);

        $propriete = new Propriete();
        $propriete->titre = $request->titre;
        $propriete->description = $request->description;
        $propriete->prix = $request->prix;
        $propriete->ville = $request->ville;
        $propriete->type = $request->type;
        $propriete->agence_id = auth()->id();
        $propriete->save();

        // Notification à l'admin
        NotificationController::createNotification(
            'Nouvelle propriété publiée',
            "L'agence " . auth()->user()->name . " a publié une nouvelle propriété : {$propriete->titre}",
            'propriete',
            1, // Id de l'admin ou destinataire
            User::class // Type de notifiable
        );

        toastr()->success("Propriété ajoutée avec succès");
        return redirect()->back();
    }

    /**
     * Mettre à jour une propriété (exemple)
     */
    public function updatePropriete(Request $request, $id)
    {
        $propriete = Propriete::findOrFail($id);

        $this->authorize('update', $propriete); // sécurité

        $propriete->update($request->only(['titre', 'description', 'prix', 'ville', 'type']));

        // Notification à l'admin
        NotificationController::createNotification(
            'Propriété modifiée',
            "L'agence " . auth()->user()->name . " a modifié la propriété : {$propriete->titre}",
            'propriete',
            1,
            User::class
        );

        toastr()->success("Propriété mise à jour avec succès");
        return redirect()->back();
    }

    /**
     * Supprimer une propriété (exemple)
     */
    public function deletePropriete($id)
    {
        $propriete = Propriete::findOrFail($id);
        $this->authorize('delete', $propriete);

        $titre = $propriete->titre;
        $propriete->delete();

        // Notification à l'admin
        NotificationController::createNotification(
            'Propriété supprimée',
            "L'agence " . auth()->user()->name . " a supprimé la propriété : {$titre}",
            'propriete',
            1,
            User::class
        );

        toastr()->success("Propriété supprimée avec succès");
        return redirect()->back();
    }
    public function info($id)
    {
        $agence = Agence::findOrFail($id);

        // Récupérer toutes les propriétés liées à cette agence
        $proprietes = Propriete::where('agence_id', $id)->with('images')->get();

        return view('admin.agence.info', compact('agence', 'proprietes'));
    }

    /**
     * Paiements reçus
     */
    public function paiementsRecus()
    {
        $paiements = Paiement::where('agence_id', auth()->id())
            ->with('client', 'propriete')
            ->latest()
            ->get();

        // Notification au client (ou à l'admin si nécessaire)
        foreach ($paiements as $paiement) {
            NotificationController::createNotification(
                'Nouveau paiement reçu',
                "Le client " . $paiement->client->name . " a effectué un paiement pour {$paiement->propriete->titre}",
                'paiement',
                1,
                User::class
            );
        }

        return view('agence.paiements', compact('paiements'));
    }

    // ... reste des méthodes inchangées ...
}
