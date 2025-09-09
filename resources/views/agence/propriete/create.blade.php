@extends('layouts.agence')

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <!-- begin page title -->
        <div class="d-block d-sm-flex flex-nowrap align-items-center">
            <div class="page-title mb-2 mb-sm-0">
                <h1>Ajout des propriétés</h1>
            </div>
            <div class="ml-auto d-flex align-items-center">
                <nav>
                    <ol class="breadcrumb p-0 m-b-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('') }}"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Accueil</li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">Propriétés</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('agence.propriete.index') }}" class="btn btn-primary mb-2">Retour à la liste</a>

<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h5 class="card-title">Formulaire d’ajout de propriété</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('agence.propriete.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
                            @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}" required>
                            @error('adresse')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pays">Pays</label>
                            <input type="text" name="pays" class="form-control" value="{{ old('pays') }}" required>
                            @error('pays')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ville">Ville</label>
                            <input type="text" name="ville" class="form-control" value="{{ old('ville') }}" required>
                            @error('ville')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="quartier">Quartier</label>
                            <input type="text" name="quartier" class="form-control" value="{{ old('quartier') }}" required>
                            @error('quartier')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">-- Sélectionnez un type --</option>
                                <option value="Appartement" {{ old('type') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                                <option value="Maison" {{ old('type') == 'Maison' ? 'selected' : '' }}>Maison</option>
                                <option value="Bureau" {{ old('type') == 'Bureau' ? 'selected' : '' }}>Bureau</option>
                            </select>
                            @error('type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nombre_de_chambres">Nombre de chambres</label>
                            <input type="number" name="nombre_de_chambres" class="form-control" value="{{ old('nombre_de_chambres') }}" required>
                            @error('nombre_de_chambres')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="salle_de_bains">Salle de bains</label>
                            <input type="number" name="salle_de_bains" class="form-control" value="{{ old('salle_de_bains') }}" required>
                            @error('salle_de_bains')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="annee_de_construction">Année de construction</label>
                            <input type="number" name="annee_de_construction" class="form-control" value="{{ old('annee_de_construction') }}">
                            @error('annee_de_construction')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="prix">Prix</label>
                            <input type="number" name="prix" class="form-control" value="{{ old('prix') }}">
                            @error('prix')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type_transaction">Type de transaction</label>
                            <select name="type_transaction" id="type_transaction" class="form-control">
                                <option value="">-- Sélectionnez le type de transaction --</option>
                                <option value="location" {{ old('type_transaction') == 'location' ? 'selected' : '' }}>Location</option>
                                <option value="vente" {{ old('type_transaction') == 'vente' ? 'selected' : '' }}>Vente</option>
                            </select>
                            @error('type_transaction')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="image">Image de la propriété</label>
                            <input type="file" name="image[]" class="form-control" accept="image/*" multiple>
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('image.*')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection