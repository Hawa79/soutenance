<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Affiche la liste paginée des utilisateurs
    public function index()
    {
        if (Auth::check()) {
            Auth::user()->update([
                'last_activity' => now(),
            ]);
        }

        $utilisateurs = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.liste.index', compact('utilisateurs'));
    }
public function liste()
{
    return $this->index(); // Appelle la méthode index déjà fonctionnelle
}

    // Activer un utilisateur
    public function activer($id)
    {
        $user = User::findOrFail($id);
        $user->statut = 'actif';
        $user->save();

        return back()->with('success', 'Utilisateur activé avec succès.');
    }

    // Désactiver un utilisateur
    public function desactiver($id)
    {
        $user = User::findOrFail($id);
        $user->statut = 'inactif';
        $user->save();

        return back()->with('success', 'Utilisateur désactivé avec succès.');
    }

    // Supprimer un utilisateur (sauf l'utilisateur connecté)
    public function supprimer($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->delete();

        return back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}
