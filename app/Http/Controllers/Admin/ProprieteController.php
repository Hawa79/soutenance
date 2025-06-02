<?php

namespace App\Http\Controllers\Admin;

use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Models\ImagePropriete;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProprieteController extends Controller
{
    public function index()
{
    $agence_id = Auth::guard('agence')->id();

        $proprietes = Propriete::with('images')
            ->where('agence_id', $agence_id)
            ->get();

        return view('agence.propriete.index', compact('proprietes'));
}

    public function create()
    {
        return view('agence.propriete.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'required|string',
                'adresse' => 'required|string|max:255',
                'pays' => 'required|string|max:100',
                'ville' => 'required|string|max:100',
                'quartier' => 'required|string|max:100',
                'type' => 'required|string|max:100',
                'nombre_de_chambres' => 'required|integer|min:1',
                'salle_de_bains' => 'required|integer|min:1',
                'proposition' => 'required|string',
                'annee_de_construction' => 'required|integer|min:1800|max:' . date('Y'),
                'prix' => 'required|integer|min:0',
                'image.*' => 'nullable|image|max:2048'
            ]);

            $propriete = Propriete::create([
                'agence_id' => Auth::guard('agence')->id(),
                'nom' => $request->nom,
                'description' => $request->description,
                'adresse' => $request->adresse,
                'pays' => $request->pays,
                'ville' => $request->ville,
                'quartier' => $request->quartier,
                'type' => $request->type,
                'nombre_de_chambres' => $request->nombre_de_chambres,
                'salle_de_bains' => $request->salle_de_bains,
                'proposition' => $request->proposition,
                'annee_de_construction' => $request->annee_de_construction,
                'prix' => $request->prix,
            ]);

            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $imagePath = $image->store('proprietes', 'public');

                    ImagePropriete::create([
                        'propriete_id' => $propriete->id,
                        'image' => $imagePath,
                    ]);
                }
            }

            toastr()->success('Propriété ajoutée avec succès.');
            return redirect()->route('agence.propriete.index');

        } catch (\Throwable $th) {
            toastr()->error('Erreur : ' . $th->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
            $propriete = Propriete::with('images')->where('id', $id)->firstOrFail();;

            // dd($propriete.images);
        return view('client.show', compact('propriete'));
        // return "bonjour".$id;
    }

    public function edit($id)
    {
        $propriete = Propriete::where('id', $id)
            ->where('agence_id', Auth::guard('agence')->id())
            ->firstOrFail();

        return view('agence.propriete.edit', compact('propriete'));
    }

    public function update(Request $request, $id)
    {
        try {
            $propriete = Propriete::where('id', $id)
                ->where('agence_id', Auth::guard('agence')->id())
                ->firstOrFail();

            $validated = $request->validate([
                'nom' => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'adresse' => 'sometimes|string',
                'pays' => 'sometimes|string',
                'ville' => 'sometimes|string',
                'quartier' => 'sometimes|string',
                'type' => 'sometimes|string',
                'nombre_de_chambres' => 'sometimes|integer|min:0',
                'salle_de_bains' => 'sometimes|integer|min:0',
                'proposition' => 'sometimes|string',
                'annee_de_construction' => 'sometimes|digits:4|integer|min:1800',
                'prix' => 'sometimes|numeric|min:0',
                'image.*' => 'nullable|image|max:2048'
            ]);

            $propriete->update($validated);

            if ($request->hasFile('image')) {
                // Supprimer les anciennes images
                foreach ($propriete->images as $image) {
                    Storage::disk('public')->delete($image->image);
                    $image->delete();
                }

                // Ajouter les nouvelles
                foreach ($request->file('image') as $image) {
                    $imagePath = $image->store('proprietes/images', 'public');

                    ImagePropriete::create([
                        'propriete_id' => $propriete->id,
                        'image' => $imagePath,
                    ]);
                }
            }

            return redirect()->route('agence.propriete.index')
                             ->with('success', 'Propriété mise à jour avec succès.');

        } catch (\Exception $e) {
            return redirect()->route('agence.propriete.edit', $id)
                             ->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $propriete = Propriete::where('id', $id)
                ->where('agence_id', Auth::guard('agence')->id())
                ->firstOrFail();

            foreach ($propriete->images as $image) {
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }

            $propriete->delete();

            return redirect()->route('agence.propriete.index')
                             ->with('success', 'Propriété supprimée avec succès.');

        } catch (\Exception $e) {
            return redirect()->route('agence.propriete.index')
                             ->with('error', 'Erreur : ' . $e->getMessage());
        }
    }
}
