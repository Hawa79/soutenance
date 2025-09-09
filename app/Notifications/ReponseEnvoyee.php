<?php
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Reponse;

class ReponseEnvoyee extends Notification
{
    protected $reponse;

    public function __construct(Reponse $reponse)
    {
        $this->reponse = $reponse;
    }

    public function via($notifiable)
    {
        return ['database']; // Notification stockée en base de données
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Vous avez reçu une réponse à votre demande : ' . $this->reponse->demande->objet,
            'reponse_id' => $this->reponse->id,
            'demande_id' => $this->reponse->demande->id,
            'agence_nom' => $this->reponse->agence->nom ?? 'Agence inconnue',
        ];
    }
}
