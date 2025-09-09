<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Agence;
use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAgenceController extends Controller
{
    /**
     * Affiche les informations d'une agence avec ses propriétés
     *
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function info($agenceId)
{
    $user = auth()->user();

    if ($user->type == User::TYPE_AGENCE) {
        // Agence connectée
        $agence = $user;
        $proprietes = Propriete::where('agence_id', $agence->id)->with('images')->get();
        return view('admin.agence.info', compact('agence', 'proprietes'));
    }

    if ($user->type == User::TYPE_ADMIN) {
        // Admin => voir les propriétés d'une agence spécifique
        $agence = User::where('id', $agenceId)->where('type', User::TYPE_AGENCE)->firstOrFail();
        $proprietes = Propriete::where('agence_id', $agence->id)->with('images')->get();
        return view('admin.agence.info', compact('agence', 'proprietes'));
    }

    abort(403, "Accès non autorisé");
}


    /**
     * Affiche les détails d'une propriété spécifique
     *
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
   public function show($id)
{
    $propriete = Propriete::with('images')->find($id);

    if (!$propriete) {
        // Si la propriété n'existe pas, redirige simplement vers la liste des agences
        return redirect()->route('admin.agence.index')
                         ->with('error', 'Propriété non trouvée.');
    }

    return view('admin.agence.show', compact('propriete'));
}

}
