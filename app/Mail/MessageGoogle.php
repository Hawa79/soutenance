<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Paiement;


class MessageGoogle extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement; // Données pour la vue

    public function __construct(Paiement $paiement)
    {
        $this->paiement = $paiement;
    }

    public function build()
    {
        return $this->from("hawakaba886@gmail.com") // L'expéditeur
                    ->subject("Reçu de Paiement") // Le sujet
                    ->markdown('emails.recuPaiement'); // La vue
    }
}