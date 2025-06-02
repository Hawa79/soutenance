<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index(){
        $paiement = Paiement::all();
        return view('paiements.index', compact('paiements'));
    }
    public function create()
    {
        return view('paiements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'propriete' => 'required|string',
            'client' => 'required|string',
            'location' => 'required|string',
            'date_paiement' => 'required|date',
            'montant' => 'required|numeric',
        ]);

        Paiement::create($request->all());

        return redirect()->route('paiements.index')->with('success', 'Paiement effectué avec succès.');
    }
    public function edit(Paiement $paiement)
    {
        return view('paiements.edit', compact('paiement'));
    }

    public function update(Request $request, Paiement $paiement)
    {
        $request->validate([
            'propriete' => 'required|string',
            'client' => 'required|string',
            'location' => 'required|string',
            'date_paiement' => 'required|date',
            'montant' => 'required|numeric',
        ]);

        $paiement->update($request->all());

        return redirect()->route('paiements.index')->with('success', 'Paiement mise à jour avec succès.');
    }
    public function destroy(Paiement $paiement)
    {
        $paiement->delete();
        return redirect()->route('paiements.index')->with('success', 'Paiement supprimé.');
    }
}
