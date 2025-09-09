<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signalement extends Model
{
    protected $fillable = [
        'signale_par',
        'type',
        'description',
        'cible_type',
        'cible_id',
        'statut',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function propriete()
    {
        return $this->belongsTo(Propriete::class);
    }
}
