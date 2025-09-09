<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'client_id',
        'agence_id',
        'propriete_id',
        'montant',
        'type',
        'frequence',
        'duree',
        'status',
        'date_transaction',
    ];

    protected $dates = [
        'date_transaction',
    ];

    // Relation vers le client
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    // Relation vers l’agence
    public function agence()
    {
        return $this->belongsTo(User::class, 'agence_id');
    }

    // Relation vers la propriété
    public function propriete()
    {
        return $this->belongsTo(Propriete::class);
    }
}
