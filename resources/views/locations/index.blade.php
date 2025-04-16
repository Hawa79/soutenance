@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Locations</h2>
    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">Ajouter une location</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Propriété</th>
                <th>Client</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Montant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr>
                    <td>{{ $location->propriete->nom ?? '—' }}</td>
                    <td>{{ $location->client->nom }} {{ $location->client->prenom }}</td>
                    <td>{{ $location->date_debut }}</td>
                    <td>{{ $location->date_fin ?? '—' }}</td>
                    <td>{{ $location->montant }} FCFA</td>
                    <td>
                        <a href="{{ route('locations.edit', $location) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('locations.destroy', $location) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette location ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
