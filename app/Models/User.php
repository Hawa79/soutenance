<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Définition des types
    public const TYPE_ADMIN = 0;
    public const TYPE_AGENCE = 1;
    public const TYPE_CLIENT = 2;

    /**
     * Attributs assignables en masse.
     */
    protected $fillable = [
        'prenom',
        'name',
        'email',
        'telephone',
        'adresse',
        'sexe',
        'password',
        'type',
        'photo',
        'statut',
        'nom_du_responsable',
        'date_inscription',
        'last_activity',
    ];

    /**
     * Attributs masqués.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Types de données pour les casts.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_activity' => 'datetime',
        'date_inscription' => 'datetime',
        'type' => 'integer',
    ];

    /**
     * Vérifie si l'utilisateur est en ligne (activité dans les 2 dernières minutes).
     */
    public function isOnline(): bool
    {
        return $this->last_activity !== null && $this->last_activity->greaterThan(now()->subMinutes(2));
    }

    /**
     * Relations
     */

    // Propriétés publiées par l'agence
    public function proprietes(): HasMany
    {
        return $this->hasMany(Propriete::class, 'agence_id');
    }

    // Paiements effectués par le client
    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class, 'user_id'); 
    }

    // Paiements reçus par l'agence via les propriétés
    public function paiementsRecus(): HasManyThrough
    {
        return $this->hasManyThrough(Paiement::class, Propriete::class, 'agence_id', 'propriete_id');
    }

    // Paiements client en attente
    public function paiementsEnAttente(): HasMany
    {
        return $this->paiements()->where('status', Paiement::STATUS_EN_ATTENTE);
    }

    // Paiements validés pour l'agence
    public function paiementsValides(): HasManyThrough
    {
        return $this->paiementsRecus()->where('status', Paiement::STATUS_PAYE);
    }

    // Messages reçus par l'utilisateur
    public function messagesRecus(): HasMany
    {
        return $this->hasMany(Message::class, 'recepteur_id');
    }

    // Messages envoyés par l'utilisateur
    public function messagesEnvoyes(): HasMany
    {
        return $this->hasMany(Message::class, 'expediteur_id');
    }

    // Réponses envoyées par l'agence
    public function reponsesEnvoyees(): HasMany
    {
        return $this->hasMany(Reponse::class, 'agence_id');
    }

    // Notifications polymorphiques
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    /**
     * Accessor pour obtenir le texte du type utilisateur.
     */
    public function getTypeTextAttribute(): string
    {
        return match($this->type) {
            self::TYPE_ADMIN => 'admin',
            self::TYPE_AGENCE => 'agence',
            self::TYPE_CLIENT => 'client',
            default => 'inconnu',
        };
    }
}
