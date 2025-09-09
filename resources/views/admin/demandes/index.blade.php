@extends('layouts.admin')

@section('content')
<style>
    .section-title {
        border-left: 4px solid #007bff;
        padding-left: 10px;
        margin-bottom: 20px;
        font-weight: bold;
    }
</style>

<h1 class="h3 mb-4 text-center text-primary">Liste des demandes</h1>

<div class="table-responsive">
    <table class="table table-bordered align-middle shadow-sm">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Agence</th>
                <th>Type</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($demandes as $demande)
                <tr>
                    <td>{{ $demande->id }}</td>
                    <td>{{ $demande->client->name ?? 'N/A' }}</td>
                    <td>{{ $demande->agence->nom ?? 'N/A' }}</td>
                    <td>{{ ucfirst($demande->type) }}</td>
                    <td>{{ $demande->created_at->format('Y-m-d') }}</td>
                    <td>
                        @php
                            $badges = [
                                'en attente' => 'warning text-dark',
                                'en cours' => 'primary',
                                'validée' => 'success',
                                'rejetée' => 'danger',
                            ];
                            $class = $badges[strtolower($demande->statut)] ?? 'secondary';
                        @endphp
                        <span class="badge bg-{{ $class }}">{{ ucfirst($demande->statut) }}</span>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info">Voir</a>
                        @if(strtolower($demande->statut) === 'en attente')
                            <a class="btn btn-sm btn-success">Valider</a>
                            <a class="btn btn-sm btn-danger">Rejeter</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Aucune demande trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
