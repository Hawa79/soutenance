<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenceAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-agence'); // Vérifie que cette vue existe
    }

    public function login(Request $request)
    {
        // Validation des données de la requête
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'L\'email est requis.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins 6 caractères.',
        ]);

        // Tentative de connexion
        if (Auth::guard('agence')->attempt($credentials)) {
            return redirect()->intended('agence/dashboard'); // Redirection après connexion
        }

        // En cas d'échec
        return back()->withErrors(['email' => 'Identifiants incorrects.'])->withInput();
    }

    public function logout(Request $request)
    {
        // Déconnexion de l'agence
        Auth::guard('agence')->logout();

        // Sécurisation de la session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Message de déconnexion et redirection
        toastr()->success('Merci pour votre visite'); // Si Toastr est bien configuré
        return redirect('/');
    }
}
