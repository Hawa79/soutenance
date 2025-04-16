@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la location</h2>

    <form action="{{ route('locations.update', $location) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="propriete_id">Propriété</label>
            <select name="propriete_id" class="form-control">
                @foreach($proprietes as $propriete)
                    <option value="{{ $propriete->id }}" {{ $location->propriete_id == $propriete->id ? 'selected' : '' }}>
                        {{ $propriete->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="client_id">Client</label>
            <select name="client_id" class="form-control">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $location->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }} {{ $client->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date_debut">Date de début</label>
            <input type="date" name="date_debut" value="{{ $location->date_debut }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="date_fin">Date de fin</label>
            <input type="date" name="date_fin" value="{{ $location->date_fin }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="montant">Montant</label>
            <input type="number" name="montant" value="{{ $location->montant }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
@endsection
