<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ou met une autorisation plus spécifique si besoin
    }

    public function rules()
    {
        $user = $this->user();  // utilisateur connecté
        $rules = [
            'password' => [
                'required',
                'string',
                'confirmed',  // mot de passe + confirmation
                // Règle personnalisée pour pas être proche de l'email
                function ($attribute, $value, $fail) use ($user) {
                    if (Str::contains(strtolower($value), strtolower($user->email))) {
                        $fail('Le mot de passe est trop proche de votre adresse e-mail actuelle.');
                    }
                },
            ],
        ];

        // Règles selon type d'utilisateur
        if ($user->type === 0) { // superadmin - règles très strictes
            $rules['password'][] = Password::min(12)->mixedCase()->numbers()->symbols()->uncompromised();
        } elseif ($user->type === 1) { // agence - règles intermédiaires
            $rules['password'][] = Password::min(10)->mixedCase()->numbers()->symbols();
        } else { // client - règles de base
            $rules['password'][] = Password::min(8)->mixedCase()->numbers();
        }

        return $rules;
    }
}
