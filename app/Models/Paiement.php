<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiement extends Model
{
    protected $table = 'paiements';

    protected $fillable = [
        'propriete_id',
        'user_id',           // client
        'agence_id',
        'type',              // achat ou location
        'montant',
        'date_paiement',
        'date_debut_location',
        'date_fin_location',
        'frequence',
        'duree',
        'unite_duree',
        'telephone',
        'status',            // en_attente, paye, refuse
        'reference_transaction',
    ];

    protected $casts = [
        'date_paiement' => 'datetime',
        'date_debut_location' => 'datetime',
        'date_fin_location' => 'datetime',
    ];

    // Constantes pour type et status
    const TYPE_ACHAT = 'achat';
    const TYPE_LOCATION = 'location';

    const STATUS_EN_ATTENTE = 'en_attente';
    const STATUS_PAYE = 'paye';
    const STATUS_REFUSE = 'refuse';

    // Relations
    public function propriete(): BelongsTo
    {
        return $this->belongsTo(Propriete::class, 'propriete_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'user_id'); // la clé étrangère est user_id
}

    public function agence(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agence_id');
    }

    // Vérification des statuts
    public function isPaye(): bool
    {
        return $this->status === self::STATUS_PAYE;
    }

    public function isRefuse(): bool
    {
        return $this->status === self::STATUS_REFUSE;
    }

    public function isEnAttente(): bool
    {
        return $this->status === self::STATUS_EN_ATTENTE;
    }
}
