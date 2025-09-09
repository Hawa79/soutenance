@extends('layouts.admin')

@section('content')

<style>
    /* Harmonisation avec le thème bleu */
    .table thead {
        background-color: #1e3a8a; /* Bleu foncé */
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

    .table td, .table th {
        vertical-align: middle;
        font-size: 15px;
    }

    .badge-success {
        background-color: #2563eb; /* Bleu clair */
        color: white;
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .badge-warning {
        background-color: #dbeafe; /* Bleu très pâle */
        color: #1e3a8a;
        font-weight: 500;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .btn-danger {
        background-color: #94a3b8; /* Gris-bleuté doux */
        border: none;
        color: #1e293b;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #cbd5e1;
        color: #0f172a;
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
        <h4 class="mb-0">La liste des utilisateurs</h4>
        <span class="text-muted">Total : {{ count($utilisateurs) }}</span>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($utilisateurs as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $user->name }}</strong></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->type_text) }}</td>
                            <td>
                                @if(auth()->check() && $user->id === auth()->user()->id)
                                    <span class="badge badge-success">Actif</span>
                                @else
                                    <span class="badge badge-warning">Inactif</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.utilisateur.supprimer', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cet utilisateur ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">Aucun utilisateur enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
