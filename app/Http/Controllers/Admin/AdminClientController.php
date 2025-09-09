<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // ou App\Models\Client si tu as un modèle Client
use Illuminate\Http\Request;

class AdminClientController extends Controller
{
    /**
     * Liste des clients
     */
    public function index()
    {
        // On suppose que type = 'client' pour identifier les clients
        $clients = User::where('type', 'client')->latest()->get();

        return view('admin.client.index', compact('clients'));
    }

    /**
     * Afficher le détail d’un client
     */
    public function show($id)
    {
        $client = User::findOrFail($id);

        return view('admin.client.show', compact('client'));
    }

    /**
     * Supprimer un client
     */
    public function destroy($id)
{
    $client = User::findOrFail($id);
    $client->delete();

    return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
}
 
}
