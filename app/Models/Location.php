<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'client_id',
        'propriete_id',
        'date_debut',
        'date_fin',
        'montant_loyer',
        'etat',
    ];
}
