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

    <form action="{{ route('client.update', $client) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nom :</label>
        <input type="text" name="name" value="{{ old('name', $client->name) }}"><br><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="{{ old('prenom', $client->prenom) }}"><br><br>

        <label>Email :</label>
        <input type="email" name="email" value="{{ old('email', $client->email) }}"><br><br>

        <label>Téléphone :</label>
        <input type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}"><br><br>

        <label>Adresse :</label>
        <input type="text" name="adresse" value="{{ old('adresse', $client->adresse) }}"><br><br>
        
        <label>Sexe :</label>
        <select name="sexe">
            <option value="M" {{ old('sexe', $client->sexe) == 'M' ? 'selected' : '' }}>M</option>
            <option value="Mme" {{ old('sexe', $client->sexe) == 'Mme' ? 'selected' : '' }}>Mme</option>
            <option value="Autre" {{ old('sexe', $client->sexe) == 'Autre' ? 'selected' : '' }}>Autre</option>
        </select><br><br>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
