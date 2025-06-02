@extends('layouts.agence')

@section('content')
<div class="row">
    <div class="col-md-12 mb-2">
        <!-- Titre de la page -->
        <div class="d-block d-sm-flex flex-nowrap align-items-center mb-3">
            <div class="page-title">
                <h1>Liste des propriétés</h1>
            </div>

            <div class="ml-auto d-flex align-items-center">
                <nav>
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/agence/dashboard') }}"><i class="ti ti-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Accueil</li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">Propriétés</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Message d'erreur global -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Bouton Ajouter -->
        <a href="{{ route('agence.propriete.create') }}" class="btn btn-primary mb-4">Ajouter une propriété</a>

        <!-- Affichage des cartes de propriétés -->
        <div class="row">
            @foreach ($proprietes as $propriete)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Image de la propriété -->
                        @php
                            $image = $propriete->images->first();
                        @endphp

                        @if ($image)
                            <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Image de la propriété">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Image par défaut">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $propriete->nom }}</h5>
                            <p class="card-text text-muted">{{ $propriete->ville }}, {{ $propriete->quartier }}</p>
                            <p class="card-text"><strong>{{ number_format($propriete->prix, 0, ',', ' ') }} FCFA</strong></p>
                        </div>

                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="{{ route('agence.propriete.edit', $propriete->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                            <form action="{{ route('agence.propriete.destroy', $propriete->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette propriété ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($proprietes->isEmpty())
            <p class="text-center mt-4">Aucune propriété enregistrée pour le moment.</p>
        @endif
    </div>
</div>
@endsection
