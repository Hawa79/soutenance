@extends('layouts.app')

@section('content')
    <h2>Modifier le client</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ old('nom', $client->nom) }}"><br><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="{{ old('prenom', $client->prenom) }}"><br><br>

        <label>Email :</label>
        <input type="email" name="email" value="{{ old('email', $client->email) }}"><br><br>

        <label>Téléphone :</label>
        <input type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}"><br><br>

        <label>Adresse :</label>
        <input type="text" name="adresse" value="{{ old('adresse', $client->adresse) }}"><br><br>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
