<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agence extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'name',
        'prenom',
        'email',
        'password',
        'adresse',
        'tel',
        'photos',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function proprietes()
    {
        return $this->hasMany(Propriete::class);
    }
   public function demandes()
    {
        return $this->hasMany(Demande::class, 'agence_id');
    }

    // Relation polymorphe pour les notifications reçues par cette agence
   public function notifications()
{
    return $this->morphMany(Notification::class, 'notifiable');
}



}
