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

<a href="{{ route('admin.agence.index') }}" class="btn btn-primary mb-2">Retour à la Liste</a>

<div class="row">
    <div class="col-xl-12">
        <div class="card card-statistics">
            <div class="card-header">
                <div class="card-heading">
                    <h5 class="card-title">Modifier</h5>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/agence/edit', $agence->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nom de l'agence</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $agence->name) }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nom du responsable</label>
                            <input type="text" name="nom_du_responsable" class="form-control" value="{{ old('nom_du_responsable', $agence->nom_du_responsable) }}">
                            @error('nom_du_responsable')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $agence->email) }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label>Téléphone</label>
                            <input type="tel" name="telephone" class="form-control" value="{{ old('telephone', $agence->telephone) }}">
                            @error('telephone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ old('description', $agence->description) }}</textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>
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