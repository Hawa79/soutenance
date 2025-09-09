@extends('layouts.frontend')

@section('content')

@php
    $proprietesALouer = $proprietes->where('type_transaction', 'location')->values();
    $proprietesAVendre = $proprietes->where('type_transaction', 'vente')->values();
@endphp

<div class="container mt-4">

    {{-- Propriétés à louer --}}
    <h3 class="mb-3 text-center" style="color: #000; font-size: 1.8rem;">Propriétés à louer</h3>
    <div class="row">
        @forelse ($proprietesALouer as $propriete)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div id="carousel{{ $propriete->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($propriete->images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100" style="height: 250px; object-fit: cover;" alt="Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>

                        @if ($propriete->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $propriete->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $propriete->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        @endif

                        {{-- Badge de statut --}}
                        <div class="position-absolute top-0 start-0 m-2">
                            @php
                                $color = 'secondary';
                                switch($propriete->statut){
                                    case 'en_attente': $color = 'warning'; break;
                                    case 'a_louer': $color = 'success'; break;
                                    case 'deja_loue': $color = 'danger'; break;
                                }
                            @endphp
                            <span class="badge bg-{{ $color }}">
                                {{ ucfirst(str_replace('_',' ',$propriete->statut)) }}
                            </span>
                        </div>

                        <div class="position-absolute bottom-0 end-0 m-2 text-white">
                            <i class="fa fa-camera"></i> {{ $propriete->images->count() }}
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="text-primary">{{ number_format($propriete->prix, 0, ',', ' ') }} <small class="text-muted">FCFA</small></h5>
                        <h6>{{ $propriete->nom }}</h6>
                        <p class="text-muted mb-2"><i class="fa fa-map-marker-alt me-1"></i> {{ $propriete->adresse }}</p>
                        <div class="d-flex justify-content-between text-secondary small">
                            <span><i class="fa fa-bed me-1"></i> {{ $propriete->nombre_de_chambres }} Chambres</span>
                            <span><i class="fa fa-bath me-1"></i> {{ $propriete->salle_de_bains }} SDB</span>
                            <span><i class="fa fa-building me-1"></i> {{ $propriete->agence->name }}</span>
                        </div>
                        <div class="text-center mt-2">
                            <a href="{{ route('propriete.show', $propriete->id) }}" class="btn btn-outline-primary w-100">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucune propriété à louer pour le moment.</p>
        @endforelse
    </div>

    {{-- Propriétés à vendre --}}
    <h3 class="mb-3 mt-5 text-center" style="color: #000; font-size: 1.8rem;">Propriétés à vendre</h3>
    <div class="row">
        @forelse ($proprietesAVendre as $propriete)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div id="carousel{{ $propriete->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($propriete->images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100" style="height: 250px; object-fit: cover;" alt="Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>

                        @if ($propriete->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $propriete->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $propriete->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        @endif

                        {{-- Badge de statut --}}
                        <div class="position-absolute top-0 start-0 m-2">
                            @php
                                $color = 'secondary';
                                switch($propriete->statut){
                                    case 'en_attente': $color = 'warning'; break;
                                    case 'a_vendre': $color = 'success'; break;
                                    case 'deja_achete': $color = 'danger'; break;
                                }
                            @endphp
                            <span class="badge bg-{{ $color }}">
                                {{ ucfirst(str_replace('_',' ',$propriete->statut)) }}
                            </span>
                        </div>

                        <div class="position-absolute bottom-0 end-0 m-2 text-white">
                            <i class="fa fa-camera"></i> {{ $propriete->images->count() }}
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="text-primary">{{ number_format($propriete->prix, 0, ',', ' ') }} <small class="text-muted">FCFA</small></h5>
                        <h6>{{ $propriete->nom}}</h6>
                        <p class="text-muted mb-2"><i class="fa fa-map-marker-alt me-1"></i> {{ $propriete->adresse }}</p>
                        <div class="d-flex justify-content-between text-secondary small">
                            <span><i class="fa fa-bed me-1"></i> {{ $propriete->nombre_de_chambres}} Chambres</span>
                            <span><i class="fa fa-bath me-1"></i> {{ $propriete->salle_de_bains }}</span>
                            <span><i class="fa fa-building me-1"></i> {{ $propriete->agence->name }}</span>
                        </div>
                        <div class="text-center mt-2">
                            <a href="{{ route('propriete.show', $propriete->id) }}" class="btn btn-outline-primary w-100">
                                Voir détails
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucune propriété à vendre pour le moment.</p>
        @endforelse
    </div>

</div>

@endsection
