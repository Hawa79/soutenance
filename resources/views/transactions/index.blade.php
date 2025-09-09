@extends('layouts.agence') {{-- Ou layouts.admin selon le rôle --}}

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">📑 Historique des Transactions</h2>

    @if($paiements->count())
    <table class="table table-bordered table-hover shadow-sm">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Propriété</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Durée</th>
                <th>Fréquence</th>
                <th>Date</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->client->name ?? '-' }}</td>
                    <td>{{ $p->propriete->titre ?? '-' }}</td>
                    <td>{{ ucfirst($p->type ?? '-') }}</td>
                    <td>{{ number_format($p->montant, 0, ',', ' ') }} FCFA</td>
                    <td>{{ $p->duree ? $p->duree . ' ' . Str::plural('mois', $p->duree) : '-' }}</td>
                    <td>{{ ucfirst($p->frequence) ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->date_paiement)->format('d/m/Y') }}</td>
                    <td>
                        <a href="mailto:{{ $p->client->email }}" class="btn btn-sm btn-info">Email</a>
                        <a href="tel:{{ $p->client->telephone }}" class="btn btn-sm btn-success">Appel</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-info">
            Aucune transaction enregistrée pour le moment.
        </div>
    @endif
</div>
@endsection
