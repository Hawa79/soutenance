@extends('layouts.agence')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <!-- Titre de la page -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Ajouter une Propriété</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Accueil
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Propriété</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('admin/propriete') }}" class="btn btn-primary mb-2">Retour à la Liste</a>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h5 class="card-title">Nouvelle Propriété</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.agence.propriete.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control" value="{{ old('type') }}">
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
                                @error('adresse')
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
                                <label for="statut">Statut</label>
                                <input type="text" name="statut" class="form-control" value="{{ old('statut') }}">
                                @error('statut')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="photos">Photos</label>
                                <input type="file" name="photos" class="form-control">
                                @error('photos')
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
