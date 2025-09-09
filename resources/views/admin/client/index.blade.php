@extends('layouts.admin')

@section('content')
<style>
    /* Tableau personnalisé */
    table.custom-table thead {
        background-color: #1e3a8a !important; /* bleu foncé */
        color: #ffffff !important;
    }

    table.custom-table tbody tr:nth-child(even) {
        background-color: #f1f5f9 !important;
    }

    table.custom-table tbody tr:nth-child(odd) {
        background-color: #ffffff !important;
    }

    table.custom-table tbody tr:hover {
        background-color: #e0f2fe !important;
        transition: background-color 0.3s ease;
    }

    table.custom-table td,
    table.custom-table th {
        vertical-align: middle !important;
        font-size: 15px !important;
    }

    /* Boutons */
    .btn-add {
        background-color: #007BFF !important;
        color: white !important;
        border: none !important;
        font-weight: 500 !important;
    }

    .btn-add:hover {
        background-color: #0056b3 !important;
    }

    .btn-danger-custom {
        background-color: #94a3b8 !important;
        color: #1e293b !important;
        border: none !important;
        font-weight: 500 !important;
    }

    .btn-danger-custom:hover {
        background-color: #cbd5e1 !important;
        color: #0f172a !important;
    }

    /* Badges */
    .badge-femme {
        background-color: #17A2B8 !important;
        color: #fff !important;
    }

    .badge-homme {
        background-color: #6C757D !important;
        color: #fff !important;
    }

    /* Card */
    .card-custom {
        background-color: #f8fafc !important;
        border: none !important;
        border-radius: 10px !important;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.03) !important;
    }

    /* Titre */
    .title-blue {
        color: #1D3A9F !important;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="title-blue">Liste des Clients</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-add">Ajouter un client</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card card-custom shadow-sm">
    <div class="card-body">
        @if($clients->count() > 0)
            <div class="table-responsive">
                <table class="table custom-table table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Sexe</th>
                            <th>Actions</th>
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
                                <td>
                                    @if($client->sexe === 'F')
                                        <span class="badge badge-femme">Femme</span>
                                    @else
                                        <span class="badge badge-homme">Homme</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce client ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger-custom btn-sm">Supprimer</button>
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
