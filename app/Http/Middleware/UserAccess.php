<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    public function handle(Request $request, Closure $next, string $userType)
    {
        $types = [
            'admin'  => 0,
            'agence' => 1,
            'client' => 2,
        ];

        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }

        // Vérifie si le type d'utilisateur correspond
        if (!isset($types[$userType]) || Auth::user()->type !== $types[$userType]) {
            return redirect()->back()->with('error', 'Vous n’avez pas la permission d’accéder à cette page.');
        }

        // ✅ Autorise l’accès
        return $next($request);
    }
}
