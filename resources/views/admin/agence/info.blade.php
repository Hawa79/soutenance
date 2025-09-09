@extends('layouts.admin')

@section('content')
<style>
.property-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.07);
    overflow: hidden;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
}
.property-card:hover {
    transform: translateY(-4px);
}
.property-image {
    width: 100%;
    height: 220px;
    object-fit: cover;
}
.property-content {
    padding: 1.5rem;
    font-family: 'Montserrat', sans-serif;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.property-title {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: #334e68;
}
.property-location {
    font-size: 0.95rem;
    color: #8898aa;
    margin-bottom: 1rem;
}
.property-price {
    font-size: 1.1rem;
    font-weight: bold;
    color: #2c7be5;
    margin-top: auto;
}
.btn-view {
    margin-top: 0.8rem;
}
.btn-back {
    margin-bottom: 20px;
}
</style>

<div class="container mt-5 mb-5">
    {{-- Bouton retour --}}
    <a href="{{ route('admin.agence.index') }}" class="btn btn-outline-secondary btn-back">
        ⬅ Retour à la liste des agences
    </a>

    <h2 class="mb-4 text-center">{{ $agence->name }}</h2>
    <p class="text-center text-muted mb-5">{{ $agence->description ?? 'Aucune description.' }}</p>

    <div class="row">
        @forelse($proprietes as $propriete)
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="property-card w-100">
                {{-- Image principale --}}
                @if($propriete->images->isNotEmpty())
                    <img src="{{ asset('storage/' . $propriete->images->first()->image) }}" alt="Image" class="property-image">
                @else
                    <img src="{{ asset('default.jpg') }}" alt="Image par défaut" class="property-image">
                @endif

                <div class="property-content">
                    <div>
                        <div class="property-title">{{ $propriete->nom }}</div>
                        <div class="property-location">
                            {{ $propriete->adresse }}, {{ $propriete->quartier }}, {{ $propriete->ville }}
                        </div>
                    </div>

                    <div class="property-price">
                        {{ number_format($propriete->prix, 0, ',', ' ') }} FCFA
                        <div class="btn-view">
                            <a href="{{ route('admin.agence.show', $propriete->id) }}" class="btn btn-primary btn-sm w-100">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Aucune propriété disponible pour cette agence.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
