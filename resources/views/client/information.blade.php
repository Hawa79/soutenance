@extends('layouts.frontend')
@section('content')
<style>
    body {
        background: linear-gradient(to right, #f8f9fa, #e9ecef);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #212529;
    }

    .info-label {
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .button-modifier:hover {
        color: #0d6efd;
    }

    .btn-custom-blue {
        background-color: #395582 !important;
        border-color: #395582 !important;
        color: #fff !important;
    }


    .info-value {
        color: #4a4a4a;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 0.4rem;
        margin-bottom: 1.25rem;
    }

    .action-add {
        font-weight: 600;
        cursor: pointer;
        color: #212529;
        user-select: none;
    }

    .action-add:hover {
        text-decoration: underline;
        color: #0d6efd;
    }

    .info-box {
        background-color: #fff;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgb(0 0 0 / 0.05);
        padding: 1.5rem 1.75rem;
        max-width: 400px;
        font-size: 0.95rem;
        line-height: 1.5;
        color: #212529;
    }

    .info-box .icon {
        font-size: 1.25rem;
        color: #6c757d;
        margin-right: 0.5rem;
        vertical-align: middle;
        user-select: none;
    }

    .back-link {
        font-weight: 600;
        color: #212529;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4em;
        margin-bottom: 2rem;
        font-size: 1rem;
        transition: color 0.2s;
    }

    .back-link:hover {
        color: #0d6efd;
    }

    .info-section {
        border-bottom: 1px solid #e0e0e0;
        /* Trait en dessous */
        padding-bottom: 15px;
        margin-bottom: 15px;
    }
</style>
<div class="container py-4">
    <!-- Lien de retour -->
    <a href="{{ route('client.compte') }}" class="back-link">
        <i class="bi bi-arrow-left"></i>
        <span>Retour</span>
    </a>

    <div class="row gx-5">
        <div class="col-12 col-lg-8">
            <h2 class="fw-bold mb-3">Informations personnelles</h2>
            <p class="mb-4 text-secondary">Bienvenue sur votre profil !
                C’est ici que vous pouvez mettre à jour vos infos personnelles à tout moment.</p>

            <div class="info-section">
                <div class="row">
                    <!-- Colonne gauche : infos personnelles -->
                    <div class="col-12 col-lg-8">
                        <div class="info-section">
                            <div class="d-flex justify-content-between align-items-center">
                                <b><span>Nom, prénom et sexe</span></b>
                                <button class="btn button-modifier" data-bs-toggle="modal" data-bs-target="#editNameModal">
                                    Modifier
                                </button>
                            </div>
                            <p>{{ Auth::user()->sexe }} {{ Auth::user()->prenom }} {{ Auth::user()->name }}</p>
                        </div>

                        <div class="info-section">
                            <div class="d-flex justify-content-between align-items-center">
                                <b><span>Numéro de téléphone</span></b>
                                <button class="btn button-modifier" data-bs-toggle="modal" data-bs-target="#editContactModal">
                                    Modifier
                                </button>
                            </div>
                            <p>{{ Auth::user()->telephone }}</p>
                        </div>

                        <div class="info-section">
                            <div class="d-flex justify-content-between align-items-center">
                                <b><span>Adresse</span></b>
                                <button class="btn button-modifier" data-bs-toggle="modal" data-bs-target="#editAdresseModal">
                                    Modifier
                                </button>
                            </div>
                            <p>{{ Auth::user()->adresse }}</p>
                        </div>
                    </div>

                    <!-- Colonne droite : info-box -->
                    <div class="col-12 col-lg-4 mt-4 mt-lg-0 d-flex justify-content-lg-center">
                        <aside class="info-box">
                            <span class="icon" aria-hidden="true" title="Information">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-lightbulb" viewBox="0 0 16 16">
                                    <path
                                        d="M2 6a6 6 0 1 1 12 0c0 2.637-1.747 4.815-2.924 5.77-.31.223-.462.498-.488.74a.178.178 0 0 1-.128.144c-.057.015-.15.025-.296.025s-.24-.01-.296-.025a.178.178 0 0 1-.128-.144c-.026-.242-.178-.517-.488-.74C3.747 10.815 2 8.636 2 6z" />
                                    <path
                                        d="M7 13.5a.5.5 0 0 0 1 0h-1zM8 1a2 2 0 0 0-2 2c0 .535.161.938.368 1.3.22.38.562.7.93.856V5h1v-.844c.368-.155.71-.475.93-.856C10.839 3.937 11 3.535 11 3a2 2 0 0 0-2-2z" />
                                </svg>
                            </span>
                            <strong>Vos infos, c’est vous qui décidez !</strong>
                            <p class="mt-2 mb-0">
                                On ne partage rien sans votre accord. Vos données sont envoyées à une agence seulement si vous choisissez de les contacter.
                            </p>
                        </aside>
                    </div>
                </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Modal -->
            @section('modals')
            <div class="modal fade" id="editNameModal" tabindex="-1" aria-labelledby="editNameModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="editNameModalLabel">Modifier le nom, le prenom et le sexe</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>

                        <div class="modal-body">
                           <form method="POST" action="{{ route('client.update', auth()->user()->id) }}">

                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="sexe" class="form-label">Sexe</label>
                                    <select class="form-select" name="sexe" id="sexe">
                                        <option selected disabled>Choisir une option</option>
                                        <option value="M" {{ auth()->user()->sexe == 'M' ? 'selected' : '' }}>M</option>
                                        <option value="Mme" {{ auth()->user()->sexe == 'Mme' ? 'selected' : '' }}>Mme</option>
                                        <option value="Autre" {{ auth()->user()->sexe == 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom *</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', auth()->user()->prenom) }}" required placeholder="Tapez votre prénom">
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom de famille *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required placeholder="Tapez votre nom de famille">
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg rounded-pill btn-custom-blue">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
            @endif

            <!-- Contact Modal -->
            <div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="editContactModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="editContactModalLabel">Modifier le numéro de téléphone</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="">
                                @csrf
                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Téléphone</label>
                                    <div class="d-flex gap-2">
                                        <select name="country_code" class="form-select w-auto" required>
                                            <option value="" selected> 🇲🇱 +223 </option>
                                        </select>
                                        <input type="text" name="telephone" value="{{ old('telephone', auth()->user()->telephone) }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg rounded-pill btn-custom-blue">Modifier</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="editAdresseModal" tabindex="-1" aria-labelledby="editAdresseModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="editAdresseModalLabel">Modifier l'adresse</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="">
                                @csrf
                                @method('PUT') <!-- N'oublie pas ça si ta route est en PUT -->

                                <div class="mb-3">
                                    <label for="adresse" class="form-label">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', auth()->user()->adresse) }}" required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg rounded-pill btn-custom-blue">Modifier</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @endsection
        </div>
    </div>
</div>
@endsection
