<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    protected $fillable = [
        'expediteur',  // id ou nom ? À préciser selon ta base
        'objet',
        'contenu',
        'lu',
        'user_id',     // utilisateur récepteur
    ];

    protected $casts = [
        'lu' => 'boolean',
    ];

    /**
     * Un message appartient à un utilisateur (récepteur).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
