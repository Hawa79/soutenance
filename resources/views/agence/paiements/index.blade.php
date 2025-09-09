@extends('layouts.agence')

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
                <th>Action</th>
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

                <!-- Actions -->
                <td class="text-center">
                    @if($p->status === 'en_attente')
                        <!-- Bouton Valider -->
                        <a href="{{ url('agence/transactions/'.$p->id.'/valider') }}"><button type="button" class="btn btn-success btn-sm text-white">Valider</button></a>

                        <!-- Bouton Rejeter -->
                        <form action="{{ route('agence.paiements.refuser', $p->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Confirmer le rejet de ce paiement ?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning btn-sm text-white">Rejeter</button>
                        </form>
                    @elseif($p->status === 'paye')
                        <span class="text-success">Payé</span>
                        <br>
                        <small class="text-muted">Statut propriété: {{ $p->propriete->statut ?? 'disponible' }}</small>
                        
                        <!-- Bouton Annuler -->
                        <form action="{{ route('agence.paiements.annuler', $p->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Annuler cette validation ?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-secondary btn-sm mt-1">Annuler</button>
                        </form>
                    @elseif($p->status === 'refuse')
                        <span class="text-danger">Refusé</span>
                        <br>
                        <small class="text-muted">Statut propriété: {{ $p->propriete->statut ?? 'disponible' }}</small>

                        <!-- Bouton Annuler -->
                        <form action="{{ route('agence.paiements.annuler', $p->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Annuler ce rejet ?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-secondary btn-sm mt-1">Annuler</button>
                        </form>
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
