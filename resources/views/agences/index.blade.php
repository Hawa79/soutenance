@extends('layouts.frontend')

@section('content')
<div class="agence-section py-5">
    <div class="container">
        <!-- ✅ Titre centré -->
        <h1 class="text-center mb-5 section-title">Nos agences immobilières</h1>

        <!-- 🔍 Liste agences -->
        <div class="row g-4">
            @forelse($agences as $agence)
            <div class="col-sm-12 col-md-6 col-lg-4 d-flex">
                <div class="agency-card flex-fill">
                    <div class="agency-image">
                        <img 
                            src="{{ $agence->logo ? asset('storage/' . $agence->logo) : 'https://placehold.co/400x300?text=Agence' }}" 
                            alt="Logo de {{ $agence->name }}">
                    </div>

                    <div class="agency-info">
                        <h3 class="agency-name">{{ $agence->name }}</h3>
                        <p class="agency-address">
                            <i class="fas fa-map-marker-alt me-2"></i> 
                            {{ $agence->adresse ?? 'Adresse non précisée' }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="badge properties-badge">
                                <i class="fas fa-home me-1"></i>
                                {{ $agence->proprietes_count ?? 0 }} biens disponibles
                            </span>
                            <a href="{{ route('agences.show', $agence->id) }}" class="btn-see">
                                Voir les biens <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-muted">Aucune agence trouvée.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection


<style>
    /* 🌆 Fond de section */
    .agence-section {
        background: #f4f6f9;
    }

    /* 📦 Carte agence */
    .agency-card {
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .agency-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 28px rgba(0,0,0,0.15);
    }

    /* 🖼️ Image */
    .agency-image {
        background: linear-gradient(135deg, #eaf3ff, #f8fbff); 
        display: flex;
        align-items: center;
        justify-content: center;
        height: 180px;
    }
    .agency-image img {
        max-height: 120px;
        max-width: 90%;
        object-fit: contain;
    }

    /* ℹ️ Infos */
    .agency-info {
        padding: 1.5rem;
        background: #fff;
    }
    .agency-name {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: #222;
    }
    .agency-address {
        font-size: 0.95rem;
        color: #555;
        margin: 0;
    }

    /* 🎯 Badge */
    .properties-badge {
        background: #e0ecff;
        color: #0d6efd;
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 500;
    }

    /* 🔗 Bouton voir biens */
    .btn-see {
        font-size: 0.9rem;
        font-weight: 600;
        color: #0d6efd;
        text-decoration: none;
        transition: color 0.2s;
    }
    .btn-see:hover {
        color: #084298;
    }

    /* 🏷️ Titre */
    .section-title {
        font-weight: 700;
        font-size: 2rem;
        color: #0d1b2a;
        text-align: center;      /* ✅ texte centré */
        display: block;
        width: 100%;
    }
    .section-title::after {
        content: "";
        display: block;
        margin: 8px auto 0;      /* ✅ centrage du soulignement */
        width: 80px;
        height: 3px;
        background: #0d6efd;
        border-radius: 2px;
    }
</style>
