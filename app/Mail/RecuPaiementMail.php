<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class RecuPaiementMail extends Mailable
{
    use Queueable, SerializesModels;

    public $paiement;

    public function __construct($paiement)
    {
        $this->paiement = $paiement;
    }

    public function build()
    {
        // Générer le PDF
        $pdf = Pdf::loadView('pdf.recu_paiement', ['paiement' => $this->paiement]);

        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject("Votre reçu de paiement")
                    ->view('emails.recu_paiement') // corps du mail HTML
                    ->attachData($pdf->output(), 'recu_paiement.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
