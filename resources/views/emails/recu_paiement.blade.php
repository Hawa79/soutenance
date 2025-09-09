<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Email - Reçu de Paiement</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f9f9f9; padding:20px;">
    <div style="max-width:600px; margin:auto; background:#fff; padding:20px; border-radius:8px;">
        <h2 style="color:#2c3e50;">Bonjour {{ $paiement->client->name }},</h2>
        <p>Nous avons bien reçu votre paiement.</p>

        <p><strong>Montant :</strong> {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</p>
        <p><strong>Propriété :</strong> {{ $paiement->propriete->nom }}</p>
        <p><strong>Date :</strong> {{ $paiement->created_at->format('d/m/Y H:i') }}</p>

        <p>Veuillez trouver ci-joint votre reçu au format PDF.</p>
        <p><em>Merci de votre confiance.<br>Agence Immobilière</em></p>
    </div>
</body>
</html>
