<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImagePropriete;
use App\Models\User;

class Propriete extends Model
{
    use HasFactory;

    // Le nom de la table (optionnel si le nom du modèle est au singulier)
    protected $table = 'proprietes';

    // Autoriser tous les champs à être insérés
    protected $guarded = [];

    /**
     * Une propriété appartient à une agence (utilisateur avec type = 1)
     */
    public function agence()
    {
        return $this->belongsTo(User::class, 'agence_id');
    }

    /**
     * Une propriété peut avoir plusieurs images
     */
    public function images()
    {
        return $this->hasMany(ImagePropriete::class);
    }
}
