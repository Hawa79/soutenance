<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de Paiement</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .container { max-width: 700px; margin: auto; padding: 20px; border: 1px solid #ccc; }
        h1 { text-align: center; color: #007BFF; }
        .info { margin: 20px 0; }
        .info p { margin: 5px 0; }
        .footer { text-align: center; margin-top: 40px; font-size: 12px; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reçu de Paiement</h1>
        <div class="info">
            <p><strong>Référence :</strong> {{ $paiement->reference_transaction }}</p>
            <p><strong>Client :</strong> {{ $paiement->client->name }} {{ $paiement->client->prenom }}</p>
            <p><strong>Agence :</strong> {{ $paiement->propriete->agence->name ?? '' }}</p>
            <p><strong>Propriété :</strong> {{ $paiement->propriete->nom }}</p>
            <p><strong>Type de transaction :</strong> {{ ucfirst($paiement->type) }}</p>
            @if($paiement->type === 'location')
                <p><strong>Durée :</strong> {{ $paiement->duree }} {{ $paiement->unite_duree }}</p>
                <p><strong>Fréquence :</strong> {{ $paiement->frequence }}</p>
            @endif
            <p><strong>Montant :</strong> {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</p>
            <p><strong>Date :</strong> {{ $paiement->date_paiement->format('d/m/Y H:i') }}</p>
        </div>

        <div class="footer">
            Ce document est un reçu officiel généré par l'agence.
        </div>
    </div>
</body>
</html>
