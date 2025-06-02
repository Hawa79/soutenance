*@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Listes des agences</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Acceuil
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Agences</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('') }}" class="btn btn-primary mb-2">Retour a la Liste</a>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h5 class="card-title">Default</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/agence/create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" name="nom" class="form-control">
                                @error('nom')
                                    <span>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Prenom</label>
                                <input type="text" name="prenom" class="form-control">
                                @error('prenom')
                                    <span>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nom d'utilisateur</label>
                                <input type="text" name="username" class="form-control">
                                @error('username')
                                    <span>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" name="email" class="form-control">
                                @error('email')
                                    <span>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="text" name="mot_de_passe" class="form-control">
                                @error('mot_de_passe')
                                    <span>{{$message}}</span>
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
