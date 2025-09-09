<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function showRegisterForm()
    {
        return view('client.register'); // Assurez-vous que vous avez la vue 'client.register' pour afficher le formulaire
    }

    /**
     * Affiche le formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('client.login');
    }

    /**
     * Gère la soumission du formulaire de connexion.
     */
    public function login(Request $request)
{
    // Validation des informations de connexion
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Récupérer les informations de connexion
    $credentials = $request->only('email', 'password');

    // Tentative de connexion
    if (Auth::guard('client')->attempt($credentials)) {
        // Si la connexion réussit, rediriger vers la page d'accueil
        return redirect()->to('/'); // Redirection vers http://127.0.0.1:8000
    }

    // Si la connexion échoue, retourner avec une erreur
    return back()->withErrors([
        'email' => 'Les informations d’identification sont incorrectes.',
    ])->withInput();
}


    /**
     * Enregistre un nouveau client.
     */
    public function register(Request $request)
    {
        // Validation des données d'inscription
        $request->validate([
            'prenom' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required',
            'adresse' => 'required',
            'sexe' => 'required|in:M,Mme,Autre',
            'password' => 'required|string|min:6|confirmed', // Confirmation du mot de passe
        ]);

        // Création du client 
        $client = User::create([
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'sexe' => $request->sexe,
            'password' => Hash::make($request->password),
        ]);

        // Authentification du client après l'inscription
        Auth::guard('client')->login($client);

        // Redirection après inscription vers la page de connexion client
        return redirect()->route('client.login')->with('success', 'Inscription réussie !');
    }

    /**
     * Déconnexion du client.
     */
   public function logout()
{
    Auth::guard('client')->logout(); // Déconnecte le client
    request()->session()->invalidate(); // Invalide la session
    request()->session()->regenerateToken(); // Régénère le token CSRF

    return redirect()->route('accueil'); // Redirection après déconnexion
}

}
