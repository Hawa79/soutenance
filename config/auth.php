<?php

return [

    // Définir les valeurs par défaut
    'defaults' => [
        'guard' => 'web', // Par défaut on utilise le guard 'web'
        'passwords' => 'users', // Réinitialisation par défaut
    ],

    // Définir les différents guards disponibles
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'client' => [
            'driver' => 'session',
            'provider' => 'clients',
        ],

        'agence' => [
            'driver' => 'session',
            'provider' => 'agences',
        ],
    ],

    // Définir les providers (les modèles à utiliser)
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'clients' => [
            'driver' => 'eloquent',
            'model' => App\Models\Client::class,
        ],

        'agences' => [
            'driver' => 'eloquent',
            'model' => App\Models\Agence::class,
        ],
    ],

    // Configuration de la réinitialisation de mot de passe
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'agences' => [
            'provider' => 'agences',
            'table' => 'password_reset_tokens', // même table partagée
            'expire' => 60,
            'throttle' => 60,
        ],

        // Tu peux aussi ajouter pour les clients si besoin
        'clients' => [
            'provider' => 'clients',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    // Timeout de confirmation de mot de passe (3h ici)
    'password_timeout' => 10800,

];
