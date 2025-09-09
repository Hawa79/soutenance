@extends('layouts.agence')

@section('content')
<div class="container py-4">
    <h2 class="mb-2 fw-bold">
        Bonjour, {{ Auth::user()->name }}
    </h2>
    <p class="text-muted mb-4">Bienvenue dans votre espace de gestion agence</p>

    <!-- Statistiques -->
    <div class="row g-3 mb-4">
        <!-- Clients -->
        <div class="col-md-3">
            <div class="card text-white shadow-sm text-center rounded" style="background-color: #1a73e8;">
                <div class="card-body">
                    <h5 class="fw-bold text-white">Clients</h5>
                    <p class="fs-4 fw-bold" style="color: orange;">{{ $nombreClients }}</p>
                </div>
            </div>
        </div>

        <!-- Propriétés -->
        <div class="col-md-3">
            <div class="card text-white shadow-sm text-center rounded" style="background-color: #4285f4;">
                <div class="card-body">
                    <h5 class="fw-bold text-white">Propriétés</h5>
                    <p class="fs-4 fw-bold" style="color: orange;">{{ $nombreProprietes }}</p>
                </div>
            </div>
        </div>

        <!-- Paiements -->
        <div class="col-md-3">
            <div class="card text-white shadow-sm text-center rounded" style="background-color: #1a73e8;">
                <div class="card-body">
                    <h5 class="fw-bold text-white">Paiements</h5>
                    <p class="fs-4 fw-bold" style="color: orange;">{{ $nombrePaiements }}</p>
                </div>
            </div>
        </div>

        <!-- Revenus -->
        <div class="col-md-3">
            <div class="card text-white shadow-sm text-center rounded" style="background-color: #4285f4;">
                <div class="card-body">
                    <h5 class="fw-bold text-white">Revenus</h5>
                    <p class="fs-4 fw-bold" style="color: orange;">
                        {{ number_format($revenusTotaux, 0, ',', ' ') }} FCFA
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
