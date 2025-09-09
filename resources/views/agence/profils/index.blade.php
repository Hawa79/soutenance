@extends('layouts.agence')
@section('content')

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    :root {
        --primary-color: #2563eb;
        --secondary-color: #2c3e50;
        --accent-color: #e74c3c;
    }
    body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .profile-card { border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); }
    .profile-header { background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); color: white; padding: 30px 0; text-align: center; }
    .profile-img { width: 150px; height: 150px; object-fit: cover; border: 5px solid white; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .profile-img-upload { position: absolute; bottom: 10px; right: 10px; background: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; }
    .profile-section { padding: 30px; background: white; margin-top: 20px; border-radius: 10px; }
    .section-title { color: var(--secondary-color); border-bottom: 2px solid var(--primary-color); padding-bottom: 10px; margin-bottom: 20px; display: inline-block; }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="profile-card">

                <!-- Header -->
                <div class="profile-header">
                    <div class="profile-img-container position-relative d-inline-block">
                        <img id="profileImage"
                             src="{{ $agence->logo ? asset('storage/' . $agence->logo) : asset('images/default-user.png') }}"
                             alt="Logo de l'agence"
                             class="profile-img rounded-circle mb-3">

                        <!-- Bouton caméra -->
                        <div class="profile-img-upload" onclick="document.getElementById('logoInput').click()">
                            <i class="fas fa-camera text-primary"></i>
                        </div>
                    </div>

                    <!-- Formulaire upload logo -->
                    <form id="logoForm" action="{{ route('agence.updateProfil') }}" method="POST" enctype="multipart/form-data" style="display:none;">
                        @csrf
                        @method('PUT')
                        <input type="file" name="logo" id="logoInput" accept="image/*" onchange="document.getElementById('logoForm').submit()">
                    </form>

                    <h2>{{ $agence->name }}</h2>
                    <p class="mb-0">{{ $agence->email }}</p>
                </div>

                <!-- Infos agence -->
                <div class="profile-section">
                    <h3 class="section-title">Informations de l'agence</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('agence.updateProfil') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="logo" id="logoInput" accept="image/*" >
                        <div class="mb-3">
                            <label for="agenceName" class="form-label">Nom complet</label>
                            <input type="text" class="form-control" id="agenceName" name="name" value="{{ $agence->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="agenceEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="agenceEmail" name="email" value="{{ $agence->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nom_responsable" class="form-label">Nom du responsable</label>
                            <input type="text" class="form-control" name="nom_du_responsable" value="{{ $agence->nom_du_responsable }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" name="telephone" value="{{ $agence->telephone }}">
                        </div>

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" name="adresse" value="{{ $agence->adresse }}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ $agence->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Enregistrer</button>
                    </form>
                </div>

                <!-- Section mot de passe -->
                <div class="profile-section mt-3">
                    <h3 class="section-title">Changer le mot de passe</h3>
                    <form action="{{ route('agence.updatePassword') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-danger"><i class="fas fa-key me-1"></i> Changer</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
