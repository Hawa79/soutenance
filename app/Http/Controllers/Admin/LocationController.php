<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'propriete' => 'required|string',
            'client' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'montant' => 'required|numeric',
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')->with('success', 'Location ajoutée avec succès.');
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'propriete' => 'required|string',
            'client' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'montant' => 'required|numeric',
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Location mise à jour avec succès.');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location supprimée.');
    }
}


