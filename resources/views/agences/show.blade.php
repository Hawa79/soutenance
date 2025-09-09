@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">{{ $agence->name }}</h2>
    <p class="text-center text-muted mb-5">{{ $agence->description ?? 'Aucune description.' }}</p>

    <div class="row">
        @forelse($agence->proprietes as $propriete)
        <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div id="carousel{{ $propriete->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @forelse ($propriete->images as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->image) }}" 
                                             class="d-block w-100" 
                                             style="height: 250px; object-fit: cover;" 
                                             alt="Image {{ $index + 1 }}">
                                    </div>
                                @empty
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/default-property.jpg') }}" 
                                             class="d-block w-100" 
                                             style="height: 250px; object-fit: cover;" 
                                             alt="Image par défaut">
                                    </div>
                                @endforelse
                            </div>

                            @if ($propriete->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $propriete->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $propriete->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            @endif

                            <div class="position-absolute top-0 end-0 p-2">
                                
                            </div>

                            

                            <div class="position-absolute bottom-0 end-0 m-2 text-white">
                                <i class="fa fa-camera"></i> {{ $propriete->images->count() }}
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="text-primary">{{ number_format($propriete->prix, 0, ',', ' ') }} <small class="text-muted">FCFA</small></h5>
                            <h6>{{ $propriete->nom ?? 'Nom de la propriété' }}</h6>
                            
                            <div class="d-flex justify-content-between text-secondary small">
                                <span><i class="fa fa-bed me-1"></i> {{ $propriete->nombre_de_chambres }} Chambres</span>
                                <span><i class="fa fa-bath me-1"></i> {{ $propriete->salle_de_bains }} SDB</span>
                                <p class="text-muted mb-2"><i class="fa fa-map-marker-alt me-1"></i> {{ $propriete->adresse }}</p>
                            </div>
                            <div class="text-center mt-2">
                                <a href="{{ route('propriete.show', ['propriete' => $propriete->id]) }}" class="btn btn-outline-primary w-100">
                                    Voir détails
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        @empty
        <p class="text-center">Aucune propriété disponible pour cette agence.</p>
        @endforelse
    </div>
</div>
@endsection