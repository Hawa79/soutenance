<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard'; // Corrigé "dashbord" → "dashboard"

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->type) {
                case 'admin':
                case 0: // si admin est type 0
                    return redirect()->route('admin.dashboard');
                case 'agence':
                case 1: // si agence est type 1
                    return redirect()->route('agence.dashboard');
                case 'client':
                case 2: // si client est type 2
                    return redirect()->route('client.dashboard');
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'Type d\'utilisateur non reconnu.');
            }
        }

        return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Déconnexion réussie.');
    }
}
