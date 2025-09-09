<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\ImagePropriete;
use App\Models\Demande;
use App\Models\Paiement;

class Propriete extends Model
{
    use HasFactory;

    protected $table = 'proprietes';

    // Champs modifiables en masse
    protected $fillable = [
        'agence_id',
        'nom',
        'pays',
        'ville',
        'description',
        'prix',
        'type',
        'disponible',
        'adresse',
        'surface',
        'nombre_de_chambres',
        'salle_de_bains', // corrigé ici
        'annee_de_construction', // ajoute si nécessaire
        'type_transaction', 
        'statut',      // ajoute si nécessaire
        // ajoutez d'autres champs nécessaires
    ];

    /**
     * Une propriété appartient à une agence (utilisateur avec type = 1)
     */
    public function agence(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agence_id');
    }

    /**
     * Une propriété peut avoir plusieurs images
     */
    public function images(): HasMany
    {
        return $this->hasMany(ImagePropriete::class);
    }

    /**
     * Une propriété peut avoir plusieurs paiements
     */
    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class);
    }

    /**
     * Vérifie si la propriété est disponible
     */
    public function estDisponible(): bool
    {
        return (bool) $this->disponible;
    }
}
