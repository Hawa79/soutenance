@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Liste des Locations</h2>
    <a href="{{ route('locations.create') }}" class="btn btn-primary mb-3">+ Ajouter une Location</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Propriété</th>
                <th>Client</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Montant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
                <tr>
                    <td>{{ $location->id }}</td>
                    <td>{{ $location->propriete }}</td>
                    <td>{{ $location->client }}</td>
                    <td>{{ $location->date_debut }}</td>
                    <td>{{ $location->date_fin }}</td>
                    <td>{{ number_format($location->montant, 0, ',', ' ') }} FCFA</td>
                    <td>
                        <a href="{{ route('locations.edit', $location) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('locations.destroy', $location) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
