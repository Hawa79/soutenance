@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une nouvelle location</h2>

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="propriete_id">Propriété</label>
            <select name="propriete_id" class="form-control">
                <option value="">Sélectionner</option>
                @foreach($proprietes as $propriete)
                    <option value="{{ $propriete->id }}">{{ $propriete->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="client_id">Client</label>
            <select name="client_id" class="form-control">
                <option value="">Sélectionner</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->nom }} {{ $client->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date_debut">Date de début</label>
            <input type="date" name="date_debut" class="form-control">
        </div>

        <div class="mb-3">
            <label for="date_fin">Date de fin</label>
            <input type="date" name="date_fin" class="form-control">
        </div>

        <div class="mb-3">
            <label for="montant">Montant</label>
            <input type="number" name="montant" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
