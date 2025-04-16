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
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}" required>
                </div>

                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}" required>
                </div>

                <button type="submit" class="btn btn-success">Enregistrer</button>
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection
