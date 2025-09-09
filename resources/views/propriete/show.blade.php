@extends('layouts.frontend')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .property-container {
        max-width: 900px;
        margin: auto;
        background: white;
        border-radius: 16px;
        padding: 3rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        font-family: 'Montserrat', sans-serif;
        color: #334e68;
    }

    .main-image {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 14px;
        transition: .4s;
    }

    .main-image:hover {
        transform: scale(1.03);
        box-shadow: 0 15px 30px rgba(0, 123, 255, 0.35);
    }

    .thumbnails {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        margin-top: 10px;
    }

    .thumbnails img {
        width: 120px;
        height: 80px;
        border-radius: 10px;
        cursor: pointer;
        opacity: 0.9;
        transition: .3s;
    }

    .thumbnails img.active,
    .thumbnails img:hover {
        opacity: 1;
        transform: scale(1.05);
        border: 2px solid #007BFF;
    }

    .info-box {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 1rem;
        margin-top: 2rem;
    }

    .info-item {
        background: #f0f6fb;
        padding: .75rem 1rem;
        border-radius: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
    }

    .btn-demande {
        margin-top: 2rem;
        text-align: center;
    }

    .bg-blue {
        background-color: #007BFF;
    }

    .text-white {
        color: #fff;
    }
</style>

<div class="bg-white box-shadow-1 z-index-10 position-relative p-top-60 p-bottom-30">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <h1>{{ $propriete->nom }}</h1>
                <h2>{{ $propriete->titre }}</h2>
                <p>{{ $propriete->adresse }}</p>
            </div>
            <div class="col-md-4 text-end">
                <h1 class="text-bold-700 text-base">{{ number_format($propriete->prix, 0, ',', ' ') }} FCFA</h1>
                <p>{{ $propriete->type_transaction === 'vente' ? 'Prix d\'achat' : 'Par mois' }}</p>
            </div>
        </div>
    </div>
</div>

<div class="property-container">
    <img id="mainImage"
        src="{{ $propriete->images->isNotEmpty() ? asset('storage/' . $propriete->images->first()->image) : asset('default.jpg') }}"
        alt="Image principale"
        class="main-image" />

    <div class="thumbnails">
        @foreach ($propriete->images as $index => $image)
        <img src="{{ asset('storage/' . $image->image) }}" onclick="changeImage(this)" class="{{ $index === 0 ? 'active' : '' }}" />
        @endforeach
    </div>

    <div class="container mt-4">
        <div class="info-box">
            <div class="info-item"><i class="fa fa-bed"></i> {{ $propriete->nombre_de_chambres }} Chambres</div>
            <div class="info-item"><i class="fa fa-bath"></i> {{ $propriete->salle_de_bains }} Salles de bain</div>
            <div class="info-item"><i class="fa fa-home"></i> {{ $propriete->type }}</div>
            <div class="info-item"><i class="fa fa-map-marker"></i> {{ $propriete->adresse }}</div>
        </div>
    </div>

    <!-- Bouton Achat/Louer -->
    <div class="btn-demande text-center">
        @auth
            @if($propriete->type_transaction === 'vente')
            <button type="button" class="btn bg-blue text-white" data-bs-toggle="modal" data-bs-target="#achatModal">
                Acheter
            </button>
            @else
            <button type="button" class="btn bg-blue text-white" data-bs-toggle="modal" data-bs-target="#locationModal">
                Louer
            </button>
            @endif
        @endauth

        @guest
        <a href="{{ route('client.login') }}" class="btn bg-blue text-white">{{ $propriete->type_transaction === 'vente' ? 'Acheter' : 'Louer' }}</a>
        @endguest
    </div>
</div>

<!-- Modal Achat -->
<div class="modal fade" id="achatModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('proprietes.acheter.payer', $propriete->id) }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-blue text-white">
                    <h5 class="modal-title"><i class="fas fa-money-bill"></i> Finaliser l'achat</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="telephoneAchat" class="form-label">Numéro Orange Money</label>
                        <div class="input-group">
                            <span class="input-group-text">+223</span>
                            <input type="text" name="telephone" id="telephoneAchat" class="form-control" placeholder="78 00 00 00" required pattern="[0-9]{8}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Montant</label>
                        <input type="text" class="form-control" value="{{ number_format($propriete->prix,0,',',' ') }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-blue text-white w-100"><i class="fas fa-check-circle"></i> Confirmer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Location -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('proprietes.louer.payer', $propriete->id) }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-blue text-white">
                    <h5 class="modal-title"><i class="fas fa-money-bill"></i> Louer la propriété</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Durée de location</label>
                        <div class="d-flex gap-2">
                            <input type="number" min="1" name="duree" class="form-control" placeholder="Ex: 3" required>
                            <select name="unite_duree" class="form-control">
                                <option value="mois">mois</option>
                                <option value="ans">ans</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fréquence de paiement</label>
                        <select name="frequence" class="form-control">
                            <option value="par mois">Par mois</option>
                            <option value="par an">Par an</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telephoneLocation" class="form-label">Numéro Orange Money</label>
                        <div class="input-group">
                            <span class="input-group-text">+223</span>
                            <input type="text" name="telephone" id="telephoneLocation" class="form-control" placeholder="78 00 00 00" required pattern="[0-9]{8}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-blue text-white w-100"><i class="fas fa-check-circle"></i> Confirmer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- DESCRIPTION -->
<div class="row">
    <div class="col-md-12 m-bottom-30">
        <div class="bg-white card-body p-4 box-shadow-1">
            <h3 class="text-bold-700 m-bottom-10">DESCRIPTION</h3>
            <p>{{ $propriete->description }}</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function changeImage(el) {
    document.getElementById('mainImage').src = el.src;
    document.querySelectorAll('.thumbnails img').forEach(img => img.classList.remove('active'));
    el.classList.add('active');
}
</script>

@endsection
