@extends('layouts.agence')

@section('content')

<style>
    .page-title h1 {
        color: #1e3a8a;
        font-weight: 600;
    }

    .btn-primary {
        background-color: #2563eb;
        border: none;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #1e40af;
    }

    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        color: #1e293b;
    }

    .card-text {
        font-size: 14px;
    }

    .btn-outline-secondary {
        border-color: #94a3b8;
        color: #334155;
    }

    .btn-outline-secondary:hover {
        background-color: #e2e8f0;
        color: #1e293b;
    }

    .btn-outline-danger {
        border-color: #94a3b8;
        color: #b91c1c;
    }

    .btn-outline-danger:hover {
        background-color: #fee2e2;
        color: #7f1d1d;
    }

    .breadcrumb-item.active {
        color: #2563eb;
        font-weight: 500;
    }

    .alert-danger {
        background-color: #fee2e2;
        color: #991b1b;
        border: none;
    }
</style>

<div class="row">
    <div class="col-md-12 mb-2">
        <!-- Titre de la page -->
        <div class="d-block d-sm-flex flex-nowrap align-items-center mb-3">
            <div class="page-title">
                <h1>Liste des propriétés</h1>
            </div>

            
        </div>

        <!-- Message d'erreur -->
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Bouton Ajouter -->
        <a href="{{ route('agence.propriete.create') }}" class="btn btn-primary mb-4">Ajouter une propriété</a>

        <!-- Cartes de propriétés -->
        <div class="row">
            @forelse ($proprietes as $propriete)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @php $image = $propriete->images->first(); @endphp

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
    
    <a href="{{ route('agence.propriete.show1', $propriete->id) }}" class="btn btn-sm btn-outline-primary">Voir détails</a>
    
    <form action="{{ route('agence.propriete.destroy', $propriete->id) }}" method="POST" onsubmit="return confirm('Supprimer cette propriété ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
    </form>
</div>

                    </div>
                </div>
            @empty
                <p class="text-center text-muted mt-4">Aucune propriété enregistrée pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
