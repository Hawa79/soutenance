<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agence;
use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProprieteController extends Controller
{

    public function index()
    {
        $proprietes = Propriete::with('agence')->get();
        return view('admin.agence.propriete.index', compact('proprietes'));

    }


    public function create()
    {
        return view('admin.agence.propriete.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'adresse' => 'required|string',
            'prix' => 'required|numeric',
            'statut' => 'required|string',
            'photos' => 'nullable|image|max:2048',
        ]);

        $propriete=new Propriete();
        $propriete->type= $request->type;
        $propriete->adresse= $request->adresse;
        $propriete->prix= $request->prix;
        $propriete->statut= $request->statut;
        $propriete->id_agence= Auth::guard('agence')->user()->id;
        if ($request->hasFile('photos')) {
            $file = $request->file('photos');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/admin/propriete', $filename);
            $propriete->photos = $filename;
        }
        $propriete->save();
         return to_route('admin.agence.propriete.index');
    }


    public function edit($id)
    {
        $propriete = Propriete::findOrFail($id);
        $agences = Agence::all();
        return view('admin.agence.propriete.edit', compact('propriete', 'agences'));
    }


    public function update(Request $request, $id)
    {
        $propriete = Propriete::findOrFail($id);
        $validatedData = $request->validate([
            'type' => 'required|string',
            'adresse' => 'required|string',
            'prix' => 'required|numeric',
            'statut' => 'required|string',
            'id_agence' => 'required|exists:agences,id',
            'photos' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photos')) {
            $path = 'uploads/' . $propriete->photo;
            if (File::Exists($path)) {
                File::delete($path);
            }
            $file = $request->file('photos');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/admin/propriete', $filename);
            $propriete->photos = $filename;
        }
        $propriete->save();
        return view('admin.agence.index');
}

    public function destroy($id)
    {
        $propriete = Propriete::findOrFail($id);
        if ($propriete->photos && Storage::exists('public/' . $propriete->photos)) {
            Storage::delete('public/' . $propriete->photos);
        }
        $propriete->delete();

        return redirect()->route('admin.agence.propriete.index')
                         ->with('success', 'Propriété supprimée avec succès.');
    }
}
