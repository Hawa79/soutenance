<?php
namespace App\Notifications;

use App\Models\Demande;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NouvelleDemandeNotification extends Notification
{
    use Queueable;

    protected $demande;

    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
    }

    public function via($notifiable)
    {
        return ['database']; // ou ['mail', 'database'] si tu veux envoyer un email
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Nouvelle demande reçue pour la propriété: ' . $this->demande->propriete->titre,
            'demande_id' => $this->demande->id,
            'client' => $this->demande->client->name,
        ];
    }
}
