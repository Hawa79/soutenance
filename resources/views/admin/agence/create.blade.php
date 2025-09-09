@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <div class="d-block d-sm-flex flex-nowrap align-items-center">
            <div class="page-title mb-2 mb-sm-0">
                <h1>L'ajout d'une agence</h1>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics">
            <div class="card-header">
                <h5 class="card-title">Nouvelle Agence</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.agence.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nom de l'agence</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nom du responsable</label>
                            <input type="text" name="nom_du_responsable" class="form-control" value="{{ old('nom_du_responsable') }}">
                            @error('nom_du_responsable')
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
                            <label>Téléphone</label>
                            <input type="tel" name="telephone" class="form-control" value="{{ old('telephone') }}">
                            @error('telephone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Adresse</label>
                            <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
                            @error('adresse')
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

                        <div class="form-group col-md-6">
                            <label>Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            @error('description')
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector("form");
        if (form) {
            form.addEventListener("submit", function (e) {
                const password = document.querySelector("input[name='password']").value;
                const confirmPassword = document.querySelector("input[name='password_confirmation']").value;

                const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&._-])[A-Za-z\d@$!%*?&._-]{8,}$/;

                if (!regex.test(password)) {
                    e.preventDefault();
                    alert("⚠️ Le mot de passe doit contenir au moins :\n- 8 caractères\n- 1 majuscule\n- 1 minuscule\n- 1 chiffre\n- 1 caractère spécial");
                    return false;
                }

                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert("⚠️ Les mots de passe ne correspondent pas.");
                    return false;
                }
            });
        }
    });
    </script>


