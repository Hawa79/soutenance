<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriete extends Model
{
    use HasFactory;

    // Table associée au modèle
    protected $table = 'proprietes';

    // Attributs non protégés (tous sont remplissables ici)
    protected $guarded = [];

    // Une propriété appartient à une agence
    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    // Une propriété peut avoir plusieurs images
    public function images()
    {
        return $this->hasMany(ImagePropriete::class);
    }
}
