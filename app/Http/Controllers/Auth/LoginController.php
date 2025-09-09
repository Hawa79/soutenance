<?php

namespace App\Http\Controllers\Auth;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

   

    /**
     * Enregistrement de l'activité après authentification.
     */
    protected function authenticated(Request $request, $user)
    {
        Activite::create([
            'user_id'    => $user->id,
            'action'     => 'Connexion',
            'description'=> 'L\'utilisateur s\'est connecté',
            'type'       => $user->type == 0 ? 'admin' : ($user->type == 1 ? 'agence' : 'client'),
            'ip_address' => $request->ip(),
        ]);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Gère la tentative de connexion.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirection selon le type d'utilisateur
            switch ($user->type) {
                case 0: // Admin
                    return redirect()->route('admin.dashboard');
                case 1: // Agence
                    return redirect()->route('agence.dashboard');
                case 2: // Client
                    return redirect('/');
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'Type d\'utilisateur non reconnu.');
            }
        }

        return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
    }

    /**
     * Déconnexion de l'utilisateur.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Déconnexion réussie.');
    }
}
