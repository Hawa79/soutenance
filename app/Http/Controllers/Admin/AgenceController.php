<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Utiliser User pour les agences
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgenceController extends Controller
{
    public function index()
    {
        $agences = User::where('type', 1)->get();
        return view('admin.agence.index', compact('agences'));
    }

    public function create()
    {
        // Pas besoin de récupérer toutes les agences ici, sauf si tu en as besoin dans la vue
        return view('admin.agence.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email', // vérifie l'unicité
            'password' => 'nullable|string|min:6', // optionnel
        ]);

        $agence = new User();
        $agence->name = $request->name;
        $agence->email = $request->email;
        // Si tu veux utiliser le mot de passe passé en formulaire sinon un mot de passe par défaut
        $agence->password = Hash::make($request->password ?? 'password');
        $agence->type = 1; // type agence
        
        $agence->save();

        toastr()->success("Agence ajoutée avec succès");
        return redirect()->route('admin.agence.index');
    }

    public function edit($id)
    {
        $agence = User::where('type', 1)->find($id);
        if (!$agence) {
            toastr()->error("Agence non trouvée");
            return redirect()->route('admin.agence.index');
        }
        return view('admin.agence.edit', compact('agence'));
    }

    public function update(Request $request, $id)
    {
        $agence = User::where('type', 1)->find($id);
        if (!$agence) {
            toastr()->error("Agence non trouvée");
            return redirect()->route('admin.agence.index');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id, // unique sauf pour lui-même
        ]);

        $agence->name = $request->name;
        $agence->email = $request->email;
        if ($request->filled('password')) {
            $agence->password = Hash::make($request->password);
        }
        $agence->save();

        toastr()->success("Agence modifiée avec succès");
        return redirect()->route('admin.agence.index');
    }

    public function delete($id)
    {
        $agence = User::where('type', 1)->find($id);
        if ($agence) {
            $agence->delete();
            toastr()->success("Agence supprimée avec succès");
        } else {
            toastr()->error("Agence non trouvée");
        }
        return redirect()->route('admin.agence.index');
    }
}
