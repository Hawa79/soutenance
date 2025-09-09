<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'sexe',
        'password',
    ];

    /**
     * Les attributs qui devraient être cachés pour les tableaux.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être castés en types natifs.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Méthode pour définir un mot de passe hashé.
     */
    public function demandes()
    {
        return $this->hasMany(Demande::class, 'client_id');
    }

    // Relation polymorphe pour les notifications reçues par ce client
    public function notifications()
{
    return $this->morphMany(Notification::class, 'notifiable');
}

}
