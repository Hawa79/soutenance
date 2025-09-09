<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paiement;
use App\Models\User;
use App\Models\Propriete;
use App\Models\Transaction;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Comptes clients (role = client)
        $nombreClients = User::where('type', User::TYPE_CLIENT)->count();

        // Comptes agences (role = agence)
        $nombreAgences = User::where('type', User::TYPE_AGENCE)->count();

        // Nombre de propriétés
        $nombreProprietes = Propriete::count();

        // Nombre de transactions
        $nombrePaiements = Paiement::count();

        return view('admin.index', compact(
            'nombreClients',
            'nombreAgences',
            'nombreProprietes',
            'nombrePaiements'
        ));
    }
}
