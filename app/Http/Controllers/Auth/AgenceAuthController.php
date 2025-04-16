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
        return view('auth.login-agence'); // Assure-toi que la vue existe bien
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::guard('agence')->attempt($credentials)) {
            return redirect('agence/dashboard'); // Redirection après connexion
        }

        return back()->withErrors(['email' => 'Identifiants incorrects']);
    }

    public function logout()
    {
        Auth::guard('agence')->logout();
        toastr()->success('Merci pour votre visite');
        return redirect('/');
    }
}
