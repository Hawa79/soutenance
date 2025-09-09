@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Les paiements effectués</h2>

    @if($paiements->count())
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Client</th>
                <th>Propriété</th>
                <th>Type</th>
                <th>Montant total</th>
                <th>Durée</th>
                <th>Fréquence</th>
                <th>Numéro du client</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $p)
            <tr>
                <td>{{ $p->client->name ?? '-' }}</td>
                <td>{{ $p->propriete->nom ?? '-' }}</td>
                <td>{{ ucfirst($p->type) }}</td>
                <td>{{ number_format($p->montant, 0, ',', ' ') }} FCFA</td>
                <td>
                    @if($p->type === 'location' && $p->duree)
                        {{ $p->duree }} {{ $p->unite_duree === 'ans' ? 'ans' : 'mois' }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $p->frequence ?? '-' }}</td>
                <td>{{ $p->client->telephone ?? '-' }}</td>
                <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    @if($p->status === 'en_attente')
                        <span class="text-warning">En attente</span>
                    @elseif($p->status === 'paye')
                        <span class="text-success">Payé</span>
                        <br>
                        <small class="text-muted">Statut propriété: {{ $p->propriete->statut ?? 'disponible' }}</small>
                    @elseif($p->status === 'refuse')
                        <span class="text-danger">Refusé</span>
                        <br>
                        <small class="text-muted">Statut propriété: {{ $p->propriete->statut ?? 'disponible' }}</small>
                    @else
                        <span class="text-muted">Aucune action disponible</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="text-muted">Aucune transaction enregistrée.</p>
    @endif
</div>
@endsection
