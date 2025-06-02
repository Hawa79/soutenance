@extends('layouts.agence')

@section('content')
<div class="container">
    <h2>Modifier la propriété</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur !</strong> Veuillez corriger les champs suivants :
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agence.propriete.update', $propriete->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Champs du formulaire préremplis -->
        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="nom" value="{{ old('nom', $propriete->nom) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description :</label>
            <textarea name="description" class="form-control" required>{{ old('description', $propriete->description) }}</textarea>
        </div>

        <div class="form-group">
            <label>Adresse :</label>
            <input type="text" name="adresse" value="{{ old('adresse', $propriete->adresse) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Pays :</label>
            <input type="text" name="pays" value="{{ old('pays', $propriete->pays) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Ville :</label>
            <input type="text" name="ville" value="{{ old('ville', $propriete->ville) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Quartier :</label>
            <input type="text" name="quartier" value="{{ old('quartier', $propriete->quartier) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Type :</label>
            <select name="type" class="form-control" required>
                <option value="">-- Sélectionner un type --</option>
                <option value="Maison" {{ old('type', $propriete->type) == 'Maison' ? 'selected' : '' }}>Maison</option>
                <option value="Appartement" {{ old('type', $propriete->type) == 'Appartement' ? 'selected' : '' }}>Appartement</option>
            </select>
        </div>

        <div class="form-group">
            <label>Nombre de chambres :</label>
            <input type="number" name="nombre_de_chambres" value="{{ old('nombre_de_chambres', $propriete->nombre_de_chambres) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Salle de bains :</label>
            <input type="number" name="salle_de_bains" value="{{ old('salle_de_bains', $propriete->salle_de_bains) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Proposition :</label>
            <input type="text" name="proposition" value="{{ old('proposition', $propriete->proposition) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Année de construction :</label>
            <input type="number" name="annee_de_construction" value="{{ old('annee_de_construction', $propriete->annee_de_construction) }}" class="form-control" min="1900" max="{{ date('Y') }}" required>
        </div>

        <div class="form-group">
            <label>Prix :</label>
            <input type="number" step="0.01" name="prix" value="{{ old('prix', $propriete->prix) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Ajouter de nouvelles images :</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label>Images existantes :</label>
            <div class="row">
                @foreach($propriete->images as $image)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid rounded" alt="Image">
                        {{-- Ajouter un bouton pour supprimer une image si nécessaire --}}
                    </div>
                @endforeach
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>
@endsection
