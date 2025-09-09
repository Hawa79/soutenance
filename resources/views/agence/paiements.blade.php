@extends('layouts.agence')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📄 Paiements reçus</h2>

    @if($paiements->count())
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Client</th>
                <th>Propriété</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Durée</th>
                <th>Fréquence</th>
                <th>Contact</th> <!-- Nouvelle colonne renommée -->
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $p)
                <tr>
                    <td>{{ $p->client->name ?? 'Inconnu' }}</td>
                    <td>{{ $p->propriete->titre ?? '-' }}</td>
                    <td>{{ ucfirst($p->type) }}</td>
                    <td>{{ number_format($p->montant, 0, ',', ' ') }} FCFA</td>
                    <td>{{ $p->duree ?? '-' }}</td>
                    <td>{{ $p->frequence ?? '-' }}</td>
                    <td>
                        <a href="mailto:{{ $p->client->email }}" class="btn btn-sm btn-info mb-1">Email</a>
                        <a href="tel:{{ $p->client->numero }}" class="btn btn-sm btn-success">Appeler</a>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($p->date_paiement)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Aucun paiement reçu pour le moment.</p>
    @endif
</div>
@endsection
