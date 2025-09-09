<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Validation des données
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'prenom' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['nullable', 'string', 'max:255'],
            'adresse' => ['nullable', 'string', 'max:255'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->mixedCase()      // au moins une majuscule et une minuscule
                    ->letters()        // contient des lettres
                    ->numbers()        // contient des chiffres
                    ->symbols()        // contient des caractères spéciaux
                    ->uncompromised(), // n’a pas fuité dans des bases de données connues
                function ($attribute, $value, $fail) use ($data) {
                    if (isset($data['email']) && str_contains($value, explode('@', $data['email'])[0])) {
                        $fail("Le mot de passe est trop proche de votre adresse e-mail.");
                    }
                },
            ],
        ]);
    }

    // Création de l'utilisateur
    protected function create(array $data)
    {
        return User::create([
            'prenom' => $data['prenom'],
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'] ?? null,
            'adresse' => $data['adresse'] ?? null,
            'password' => Hash::make($data['password']),
            'type' => 2, // client par défaut
        ]);
    }
}
