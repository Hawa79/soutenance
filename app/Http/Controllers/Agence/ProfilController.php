<?php

namespace App\Http\Controllers\Agence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Afficher le formulaire de profil (Agence).
     */
    public function index()
    {
        $agence = Auth::user(); // utilisateur connecté
        return view('agence.profils.index', compact('agence'));
    }

    /**
     * Mettre à jour le profil de l’agence.
     */
    public function update(Request $request)
    {
        $agence = Auth::user(); // on utilise l'utilisateur connecté

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $agence->id,
            'telephone' => 'nullable|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $agence->name = $request->name;
        $agence->email = $request->email;
        $agence->telephone = $request->telephone;

        // Upload du logo si fourni
        if ($request->hasFile('logo')) {
            if ($agence->logo) {
                Storage::disk('public')->delete($agence->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $agence->logo = $path;
        }

        $agence->save();

        return redirect()->route('agence.profils.index')->with('success', 'Profil mis à jour avec succès.');
    }

    /**
     * Mettre à jour le mot de passe de l’agence.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('password_error', 'Le mot de passe actuel est incorrect.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('password_success', 'Mot de passe mis à jour avec succès.');
    }

    /* -------------------- PARTIE ADMINISTRATEUR -------------------- */

    public function adminIndex()
    {
        $user = Auth::user();
        return view('admin.profil.index', compact('user'));
    }

    public function adminUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->filled('name')) $user->name = $request->name;
        if ($request->filled('email')) $user->email = $request->email;

        if ($request->hasFile('logo')) {
            if ($user->logo) {
                Storage::disk('public')->delete($user->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $user->logo = $path;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil administrateur mis à jour avec succès.');
    }

    public function adminUpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('password_error', 'Le mot de passe actuel est incorrect.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('password_success', 'Mot de passe administrateur mis à jour avec succès.');
    }
}
