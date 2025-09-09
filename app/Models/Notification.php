<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'lu',
        'notifiable_id',
        'notifiable_type',
        'paiement_id', // lien direct avec le paiement
        'type',        // paiement, nouvelle_propriete, validation, rejet, autre
        'url',         // lien vers page
    ];

    protected $casts = [
        'lu' => 'boolean',
    ];

    // Constantes types
    public const TYPE_PAIEMENT = 'paiement';
    public const TYPE_NOUVELLE_PROPRIETE = 'nouvelle_propriete';
    public const TYPE_VALIDATION = 'validation';
    public const TYPE_REJET = 'rejet';
    public const TYPE_AUTRE = 'autre';

    /**
     * Polymorphic relation vers l'utilisateur ou l'agence
     */
    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Relation vers le paiement
     */
    public function paiement(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Paiement::class);
    }

    /**
     * Récupérer directement le client via le paiement
     */
    public function client()
    {
        return $this->paiement?->client;
    }

    /**
     * Scope notifications non lues
     */
    public function scopeNonLues(Builder $query): Builder
    {
        return $query->where('lu', false);
    }

    /**
     * Marquer comme lue
     */
    public function marquerCommeLue(): void
    {
        $this->update(['lu' => true]);
    }
}
