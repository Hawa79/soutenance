@extends('layouts.agence')

@section('content')
<style>
    .property-details {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    font-size: 0.9rem;
    color: #555;
}
.property-details span {
    background: #f0f6fb;
    padding: 6px 12px;
    border-radius: 8px;
}
.property-price {
    font-size: 1.1rem;
    font-weight: bold;
    color: #2c7be5;
    margin-top: 1rem;
}
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
        box-shadow: 0 15px 30px rgba(163, 206, 241, 0.35);
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
        border: 2px solid #a3cef1;
    }

    .btn-retour {
        margin-bottom: 1rem;
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
</style>

<div class="container mt-4">

    {{-- Bouton Retour --}}
    <a href="{{ route('agence.propriete.index') }}" class="btn btn-outline-secondary btn-retour">
        <i class="fa fa-arrow-left"></i> Retour à la liste
    </a>

    <div class="col-md-8">
        <h2>{{ $propriete->nom }}                      {{ $propriete->prix }}FCFA</h2>
    </div>
    <!-- Image principale -->
    <img id="mainImage"
        src="{{ $propriete->images->isNotEmpty() ? asset('storage/' . $propriete->images->first()->image) : asset('default.jpg') }}"
        alt="Image principale"
        class="main-image" />

    <!-- Miniatures -->
    <div class="thumbnails">
        @foreach ($propriete->images as $index => $image)
            <img src="{{ asset('storage/' . $image->image) }}"
                onclick="changeImage(this)"
                class="{{ $index === 0 ? 'active' : '' }}" />
        @endforeach
    </div>
<div class="property-details">
          <div class="bg-white card-body p-4 box-shadow-1 mt-4">
                        <span>{{ $propriete->type_transaction }}</span>
                        <span>{{ $propriete->type }}</span>
                        <span>{{ $propriete->nombre_de_chambres }} ch</span>
                        <span>{{ $propriete->salle_de_bains }} sdb</span>
                        <span>Agence : {{ $propriete->agence->name ?? 'N/A' }}</span>
                    </div>
                    </div>
    <div class="col-md-12 m-bottom-30">
        <div class="bg-white card-body p-4 box-shadow-1 mt-4">
            <h3 class="text-bold-700 mb-3">DESCRIPTION</h3>
            <hr>
            <p>{{$propriete->description}}</p>
           
        </div>
    </div>
</div>

<script>
    function changeImage(el) {
        document.getElementById("mainImage").src = el.src;

        document.querySelectorAll('.thumbnails img').forEach(img => img.classList.remove('active'));
        el.classList.add('active');
    }
</script>
@endsection
