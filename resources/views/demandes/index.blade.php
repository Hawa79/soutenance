@extends('layouts.agence')

@section('content')
<div class="container mt-4">
    <h3>Demandes reçues</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Client</th>
                <th>Propriété</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($demandes as $demande)
                <tr>
                    <td>{{ $demande->client->name ?? 'Client supprimé' }}</td>
                    <td>{{ $demande->propriete->titre ?? 'Propriété supprimée' }}</td>
                    <td>{{ $demande->message }}</td>
                    <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Aucune demande reçue.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
