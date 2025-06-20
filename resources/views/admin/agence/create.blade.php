@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Ajouter une agence</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Accueil
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Agences</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton retour -->
    <a href="{{ route('admin.agence.index') }}" class="btn btn-secondary mb-3">← Retour à la liste</a>

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h5 class="card-title">Nouvelle Agence</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.agence.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nom complet</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Mot de passe</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer l’agence</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
