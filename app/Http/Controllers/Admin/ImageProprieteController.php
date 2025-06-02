<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImagePropriete;
use App\Models\Propriete;

class ImageProprieteController extends Controller
{
    // Liste des images
    public function index()
    {
        $images = ImagePropriete::with('propriete')->get();
        return view('images.index', compact('images'));
    }

    // Formulaire d'ajout d'image
    public function create()
    {
        $proprietes = Propriete::all(); // Récupère toutes les propriétés
        return view('images.create', compact('proprietes'));
    }

    // Enregistrement d'une image
    public function store(Request $request)
    {
        $request->validate([
            'propriete_id' => 'required|exists:proprietes,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        ImagePropriete::create([
            'propriete_id' => $request->propriete_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('images.index')->with('success', 'Image ajoutée avec succès');
    }

    // Affichage d'une seule image
    public function show($id)
    {
        $image = ImagePropriete::with('propriete')->findOrFail($id);
        return view('images.show', compact('image'));
    }

    // Formulaire d'édition (si tu veux l’ajouter plus tard)
    public function edit($id)
    {
        $image = ImagePropriete::findOrFail($id);
        $proprietes = Propriete::all();
        return view('images.edit', compact('image', 'proprietes'));
    }

    // Mise à jour d'une image
    public function update(Request $request, $id)
    {
        $image = ImagePropriete::findOrFail($id);

        $request->validate([
            'propriete_id' => 'sometimes|exists:proprietes,id',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->has('propriete_id')) {
            $image->propriete_id = $request->propriete_id;
        }

        if ($request->hasFile('image')) {
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }

            $newPath = $request->file('image')->store('images', 'public');
            $image->image = $newPath;
        }

        $image->save();

        return redirect()->route('images.index')->with('success', 'Image mise à jour avec succès');
    }

    // Suppression d'une image
    public function destroy($id)
    {
        $image = ImagePropriete::findOrFail($id);

        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return redirect()->route('images.index')->with('success', 'Image supprimée avec succès');
    }
}
