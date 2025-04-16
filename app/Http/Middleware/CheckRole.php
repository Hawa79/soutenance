<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifier si l'utilisateur est connecté et si son rôle correspond
        if (Auth::check() && Auth::user()->role !== $role) {
            return redirect('/');  // Rediriger vers la page d'accueil si le rôle ne correspond pas
        }

        return $next($request);  // Continuer si le rôle est valide
    }
}

