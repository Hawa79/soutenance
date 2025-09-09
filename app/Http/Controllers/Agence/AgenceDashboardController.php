<?php

namespace App\Http\Controllers\Agence;

use App\Models\User;
use App\Models\Paiement;
use App\Models\Propriete;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgenceDashboardController extends Controller
{
    /**
     * Affiche le tableau de bord de l'agence.
     */
    public function index()
    {
        $user = Auth::user();

        // Nombre clients (clients avec rôle 'client')
        $nombreClients = User::where('type', User::TYPE_CLIENT)->count();

        // Nombre propriétés de cette agence (propriétés liées à l'utilisateur connecté)
        $nombreProprietes = Propriete::where('agence_id', $user->id)->count();

        // Nombre de transactions sur les propriétés de cette agence
        $nombrePaiements = Paiement::whereHas('propriete', function ($query) use ($user) {
            $query->where('agence_id', $user->id);
        })->count();

        // Revenus totaux des transactions liées à cette agence
        $revenusTotaux = Paiement::whereHas('propriete', function ($query) use ($user) {
            $query->where('agence_id', $user->id);
        })->sum('montant');

        return view('agence.index', compact(
            'nombreClients',
            'nombreProprietes',
            'nombrePaiements',
            'revenusTotaux'
        ));
    }
}
