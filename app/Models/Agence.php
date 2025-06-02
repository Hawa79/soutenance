<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agence extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nom',
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
  

}
