<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reçu de Paiement</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        .container { padding: 20px; }
        h2 { color: #2c3e50; }
        .footer { margin-top: 30px; font-size: 12px; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reçu de Paiement</h2>
        <p><strong>Client :</strong> {{ $paiement->client->name }}</p>
        <p><strong>Propriété :</strong> {{ $paiement->propriete->nom }}</p>
        <p><strong>Montant :</strong> {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</p>
        <p><strong>Date :</strong> {{ $paiement->created_at->format('d/m/Y H:i') }}</p>

        <p class="footer">Merci de votre confiance.<br>Agence Immobilière</p>
    </div>
</body>
</html>
