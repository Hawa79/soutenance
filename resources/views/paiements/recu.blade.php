@extends('layouts.frontend')

@section('content')
<div class="container my-5 p-4 bg-white shadow rounded">
    <h2 class="text-center mb-4">Reçu de paiement</h2>

    <div class="mb-3">
        <strong>Référence :</strong> {{ $paiement->reference_transaction }}
    </div>
    <div class="mb-3">
        <strong>Client :</strong> {{ $paiement->client->name }} {{ $paiement->client->prenom }}
    </div>
    <div class="mb-3">
        <strong>Propriété :</strong> {{ $paiement->propriete->nom }}
    </div>
    <div class="mb-3">
        <strong>Type de transaction :</strong> {{ ucfirst($paiement->type) }}
    </div>
    @if($paiement->type === 'location')
        <div class="mb-3">
            <strong>Durée :</strong> {{ $paiement->duree }} {{ $paiement->unite_duree }}
        </div>
        <div class="mb-3">
            <strong>Fréquence :</strong> {{ $paiement->frequence }}
        </div>
        <div class="mb-3">
            <strong>Date de fin de location :</strong> {{ $paiement->date_fin_location?->format('d/m/Y') }}
        </div>
    @endif
    <div class="mb-3">
        <strong>Montant payé :</strong> {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA
    </div>
    <div class="mb-3">
        <strong>Date de paiement :</strong> {{ $paiement->date_paiement->format('d/m/Y H:i') }}
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('client.dashboard') }}" class="btn btn-primary">Retour au tableau de bord</a>
        <button onclick="window.print()" class="btn btn-success">Imprimer le reçu</button>
        <a href="{{ route('client.paiements.pdf', $paiement->id) }}" class="btn btn-info">Télécharger le PDF</a>
    </div>
</div>
@endsection
