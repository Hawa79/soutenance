@extends('layouts.agence')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Mes Clients</h2>

    @if($clients->count())
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nom complet</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Nombre de Paiements</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->name }} {{ $client->prenom }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->telephone }}</td>
                <td>{{ $client->adresse }}</td>
                <td>{{ $client->transactions_count }}</td>
               <td>
                    <form action="{{ route('paiements.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce paiement ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-info">Aucun client trouvé pour cette agence.</div>
    @endif
</div>
@endsection
