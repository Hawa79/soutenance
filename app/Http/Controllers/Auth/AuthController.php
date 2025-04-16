<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gérer l'authentification
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Rediriger selon le rôle
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'agence') {
                return redirect()->route('agence.dashboard');
            } elseif ($user->role === 'client') {
                return redirect()->route('client.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Identifiants incorrects']);
    }

    // Déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
