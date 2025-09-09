@extends('layouts.admin')

@section('content')

<style>
    /* Harmonisation avec le thème bleu */
    .table thead {
        background-color: #1e3a8a;
        color: #ffffff;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f1f5f9;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .table tbody tr:hover {
        background-color: #e0f2fe;
        transition: background-color 0.3s ease;
    }

    .table td,
    .table th {
        vertical-align: middle;
        font-size: 15px;
    }

    .btn-success {
        background-color: #2563eb;
        border: none;
        color: white;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #1e40af;
    }

    .btn-secondary {
        background-color: #3b82f6;
        border: none;
        color: white;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #2563eb;
    }

    .btn-danger {
        background-color: #94a3b8;
        border: none;
        color: #1e293b;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #cbd5e1;
        color: #0f172a;
    }

    .btn-info {
        background-color: #0ea5e9;
        color: #fff;
        font-weight: 500;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #0284c7;
    }

    .card {
        background-color: #f8fafc;
        border: none;
        border-radius: 10px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.03);
    }

    .card-header h4 {
        color: #1e3a8a;
    }
</style>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Liste des agences</h4>
        <a href="{{ route('admin.agence.create') }}" class="btn btn-success">Ajouter une agence</a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 table-bordered">
                <thead>
                    <tr>
                        <th>Nom de l'agence</th>
                        <th>Nom du responsable</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($agences) && $agences->count() > 0)
                        @foreach ($agences as $agence)
                        <tr>
                            <td>{{ $agence->name }}</td>
                            <td>{{ $agence->nom_du_responsable }}</td>
                            <td>{{ $agence->email }}</td>
                            <td>{{ $agence->telephone }}</td>
                            <td>{{ $agence->adresse }}</td>
                            <td>{{ $agence->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <!-- Bouton Voir Détail corrigé -->
                                <a href="{{ route('admin.agence.info', ['id' => $agence->id]) }}">
                                    <button type="button" class="btn btn-sm btn-info">Voir Détail</button>
                                </a>

                                <a href="{{ route('admin.agence.edit', $agence->id) }}">
                                    <button type="button" class="btn btn-sm btn-secondary">Modifier</button>
                                </a>

                                <a href="{{ route('admin.agence.delete', $agence->id) }}"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette agence ?')">
                                    <button type="button" class="btn btn-sm btn-danger">Supprimer</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center text-muted">Aucune agence trouvée.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
