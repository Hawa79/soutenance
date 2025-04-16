@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Modifier une agence</h1>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ url('admin/agence/index') }}" class="btn btn-primary mb-2">Retour à la Liste</a>

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h5 class="card-title">Modifier</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/agence/edit', $agence->id) }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text" name="nom" class="form-control" value="{{ old('nom', $agence->nom) }}">
                                @error('nom')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Prénom</label>
                                <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $agence->prenom) }}">
                                @error('prenom')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nom d'utilisateur</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username', $agence->username) }}">
                                @error('username')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $agence->email) }}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
