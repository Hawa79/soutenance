<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de paiement</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 30px;
            border: 1px solid #ddd;
            max-width: 700px;
            margin: auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 120px;
            margin-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            color: #2c3e50;
        }
        .info {
            margin-bottom: 12px;
        }
        .info span {
            font-weight: bold;
            width: 180px;
            display: inline-block;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 0.9rem;
            color: #777;
        }
        hr {
            border: 0;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
        .status {
            padding: 5px 12px;
            border-radius: 4px;
            color: white;
            display: inline-block;
        }
        .status.en_attente { background-color: #f39c12; }
        .status.paye { background-color: #27ae60; }
        .status.refuse { background-color: #c0392b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo Agence">
            <h2>Reçu de paiement</h2>
        </div>

        <hr>

        <div class="info"><span>Référence :</span> {{ $paiement->reference_transaction }}</div>
        <div class="info"><span>Client :</span> {{ $paiement->client->name }} {{ $paiement->client->prenom }}</div>
        <div class="info"><span>Propriété :</span> {{ $paiement->propriete->nom }}</div>
        <div class="info"><span>Type de transaction :</span> {{ ucfirst($paiement->type) }}</div>

        @if($paiement->type === 'location')
            <div class="info"><span>Durée :</span> {{ $paiement->duree }} {{ $paiement->unite_duree }}</div>
            <div class="info"><span>Fréquence :</span> {{ $paiement->frequence }}</div>
            <div class="info"><span>Date de début :</span> {{ $paiement->created_at->format('d/m/Y') }}</div>
            <div class="info"><span>Date de fin :</span> {{ $paiement->date_fin_location?->format('d/m/Y') }}</div>
        @endif

        <div class="info"><span>Montant payé :</span> {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</div>
        <div class="info"><span>Date de paiement :</span> {{ $paiement->date_paiement->format('d/m/Y H:i') }}</div>
        <div class="info"><span>Status :</span>
            <span class="status {{ $paiement->status }}">{{ ucfirst($paiement->status) }}</span>
        </div>

        <hr>

        <div class="footer">
            Merci pour votre confiance.<br>
            {{ $paiement->agence->name }} {{ $paiement->agence->adresse }}
        </div>
    </div>
</body>
</html>
