@extends('layouts.admin')
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
    .profile-section { padding: 30px; background: white; }
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
                             src="{{ $user->logo ? asset('storage/' . $user->logo) : asset('images/default-user.png') }}"
                             alt="Photo de profil"
                             class="profile-img rounded-circle mb-3">

                        <!-- Bouton caméra -->
                        <div class="profile-img-upload" onclick="document.getElementById('avatarInput').click()">
                            <i class="fas fa-camera text-primary"></i>
                        </div>
                    </div>

                    <!-- Formulaire upload avatar -->
                    <form id="avatarForm" action="" method="POST" enctype="multipart/form-data" style="display:none;">
                        @csrf
                        @method('PUT')
                        <input type="file" name="avatar" id="avatarInput" accept="image/*" onchange="document.getElementById('avatarForm').submit()">
                    </form>

                    <h2>{{ $user->name }}</h2>
                    <p class="mb-0">{{ $user->email }}</p>
                </div>

                <!-- Infos utilisateur -->
                <div class="profile-section">
                    <h3 class="section-title">Informations de l'utilisateur</h3>

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="userName" class="form-label">Nom complet</label>
                            <input type="text" class="form-control" id="userName" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="email" value="{{ $user->email }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Enregistrer</button>
                    </form>
                </div>

                <!-- Section mot de passe -->
                <div class="profile-section mt-3">
                    <h3 class="section-title">Changer le mot de passe</h3>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Mot de passe actuel</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" id="new_password" class="form-control" required>
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
