@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Liste des Clients</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @if($clients->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Sexe</th>
                                <th>Actions</th> <!-- Nouvelle colonne -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{ $client->prenom }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->telephone }}</td>
                                    <td>{{ $client->adresse }}</td>
                                    <td>{{ $client->sexe }}</td>
                                    <td>
                                        <!-- Bouton Supprimer -->
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce client ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted">Aucun client enregistré pour le moment.</p>
            @endif
        </div>
    </div>
@endsection
