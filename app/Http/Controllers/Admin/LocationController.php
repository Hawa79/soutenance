<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Propriete;
use App\Models\Client;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Affiche la liste des locations
    public function index()
    {
        $locations = Location::with(['propriete', 'client'])->get();
        return view('locations.index', compact('locations'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $proprietes = Propriete::all();
        $clients = Client::all();
        return view('locations.create', compact('proprietes', 'clients'));
    }

    // Enregistre une nouvelle location
    public function store(Request $request)
    {
        $request->validate([
            'propriete_id' => 'required|exists:proprietes,id',
            'client_id' => 'required|exists:clients,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'montant' => 'required|numeric',
        ]);

        Location::create([
            'propriete_id' => $request->propriete_id,
            'client_id' => $request->client_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'montant' => $request->montant,
        ]);

        return redirect()->route('locations.index')->with('success', 'Location enregistrée avec succès.');
    }

    // Affiche une seule location
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    // Affiche le formulaire d'édition
    public function edit(Location $location)
    {
        $proprietes = Propriete::all();
        $clients = Client::all();
        return view('locations.edit', compact('location', 'proprietes', 'clients'));
    }

    // Met à jour la location
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'propriete_id' => 'required|exists:proprietes,id',
            'client_id' => 'required|exists:clients,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'montant' => 'required|numeric',
        ]);

        $location->update([
            'propriete_id' => $request->propriete_id,
            'client_id' => $request->client_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'montant' => $request->montant,
        ]);

        return redirect()->route('locations.index')->with('success', 'Location mise à jour avec succès.');
    }

    // Supprime une location
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location supprimée avec succès.');
    }
}

