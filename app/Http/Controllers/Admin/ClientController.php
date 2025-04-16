<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Affiche la liste des clients.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Affiche le formulaire de création d’un nouveau client.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Enregistre un nouveau client dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required',
            'adresse' => 'required',
        ]);

        // Enregistrement du client
        Client::create($request->only(['nom', 'prenom', 'email', 'telephone', 'adresse']));

        // Redirection avec un message de succès
        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
    }

    /**
     * Affiche les détails d’un client.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Affiche le formulaire de modification d’un client.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Met à jour les informations d’un client.
     */
    public function update(Request $request, Client $client)
    {
        // Validation avec exclusion de l’email actuel
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'telephone' => 'required',
            'adresse' => 'required',
        ]);

        // Mise à jour du client
        $client->update($request->only(['nom', 'prenom', 'email', 'telephone', 'adresse']));

        return redirect()->route('clients.index')->with('success', 'Client modifié avec succès.');
    }

    /**
     * Supprime un client.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
