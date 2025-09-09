@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Ajouter un nouveau client</h4>
    </div>
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}" required>
            </div>

            <div class="mb-3">
                <label for="sexe" class="form-label">Sexe</label>
                <select name="sexe" class="form-control" required>
                    <option value="">-- Sélectionnez le sexe --</option>
                    <option value="M" {{ old('sexe') == 'M' ? 'selected' : '' }}>M</option>
                    <option value="Mme" {{ old('sexe') == 'Mme' ? 'selected' : '' }}>Mme</option>
                    <option value="Autre" {{ old('sexe') == 'Autre' ? 'selected' : '' }}>Autre</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    required
                    pattern="^(?=(?:.*[a-z]){1,})(?=(?:.*[A-Z]){1,})(?=(?:.*\d){1,})(?=(?:.*[^a-zA-Z\d]){1,}).{8,}$"
                    title="Au moins 8 caractères, incluant 3 des éléments suivants : lettre minuscule, majuscule, chiffre, caractère spécial"
                >
                <small class="form-text text-muted">
                    Votre mot de passe doit contenir au moins 8 caractères, dont au moins 3 des éléments suivants : une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial.
                </small>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection
