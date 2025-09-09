<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class AdminController extends Controller
{
    /**
     * Affiche la page principale ou liste.
     */
    public function index()
    {
        $notifications = Notification::where('user_id', Auth::id())
                                     ->orderBy('created_at', 'desc')
                                     ->get();

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Affiche le profil de l'admin connecté.
     */
   

    /**
     * Déconnexion de l'admin.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalider la session
        $request->session()->invalidate();

        // Régénérer le token CSRF
        $request->session()->regenerateToken();

        // Rediriger vers la page de login admin
        return redirect()->route('admin.login');
    }
}
