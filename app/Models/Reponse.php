<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = ['demande_id', 'agence_id', 'message'];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function agence()
    {
        return $this->belongsTo(User::class, 'agence_id');
    }
}
