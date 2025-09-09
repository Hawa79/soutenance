@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">Historique des activités</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Type</th>
                <th>Action</th>
                <th>Description</th>
                <th>Adresse IP</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activites as $act)
            <tr>
                <td>{{ $act->user->prenom ?? 'Système' }}</td>
                <td>{{ ucfirst($act->type) }}</td>
                <td>{{ $act->action }}</td>
                <td>{{ $act->description }}</td>
                <td>{{ $act->ip_address }}</td>
                <td>{{ $act->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $activites->links() }}
</div>
@endsection
