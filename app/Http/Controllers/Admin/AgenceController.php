<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgenceController extends Controller
{
    public function index()
    {
        $agences = Agence::all();
        return view('admin/agence.index', compact('agences'));
    }
    public function create()
    {
        $agences = Agence::all();
        return view('admin/agence.create', compact('agences'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email'

        ]);
        $agence = new Agence();
        $agence->nom = $request->nom;
        $agence->prenom = $request->prenom;
        $agence->email = $request->email;
        $agence->username = $request->username;
        $agence->password = Hash::make('password');
        $agence->save();
        toastr()->success("Agence ajoute avec success");
        return redirect('admin/agence');
    }
    public function edit($id)
    {
        $agence = Agence::where('id', $id)->first();
        return view('admin/agence.edit', compact('agence'));
    }

    public function update(Request $request, $id)
    {
        $agence = Agence::where('id', $id)->first();
        $agence->nom = $request->nom;
        $agence->prenom = $request->prenom;
        $agence->email = $request->email;
        $agence->username = $request->username;
        $agence->save();
        toastr()->success("Agence modifier avec success");
        return redirect('admin/agence');
    }
    public function delete($id)
    {
        $agence = Agence::where('id', $id)->delete();
        return redirect('admin/agence');
    }

}
