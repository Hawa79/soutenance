<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePropriete extends Model
{
    use HasFactory;

    protected $table = 'images_proprietes';

    protected $fillable = [
        'propriete_id',
        'image' // ou 'chemin_image' selon le nom exact dans ta base
    ];

    // Relation inverse : une image appartient à une propriété
    public function propriete()
    {
        return $this->belongsTo(Propriete::class);
    }
}
