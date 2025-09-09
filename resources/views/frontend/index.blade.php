@extends('layouts.frontend')
@section('content')
<style>
    .property-media {
        min-height: 450px;
        display: flex;
        align-items: center;
    }

    .bg-property-slider-1,
    .bg-property-slider-2,
    .bg-property-slider-3 {
        background-size: contain;
        /* ✅ Changer "cover" en "contain" */
        background-repeat: no-repeat;
        background-position: center center;
    }

    .property a,
    .property a:hover {
        text-decoration: none;
    }
</style>

<div class="owl-carousel owl-theme owl-nav-wide"
    data-plugin-options="{'items': 1, 'margin': 10, 'nav': true, 'dots': false, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000}">

    <div class="bg-property-slider-1 bg-no-repeat bg-size-cover">
        <div class="property">
            <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                <div class="container p-top-100">
                    <div class="clearfix"></div>
                    <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">1 000 000 FCFA</h2>
                    <h5>
                        <a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10" href="#">
                            Résidence Les Orchidées
                        </a>
                    </h5>
                    <p class="text-white">Rue 238, ACI 2000, Bamako, MALI</p>
                </div>
                <div class="overlay bg-bg opacity-9"></div>
            </div>
        </div>
    </div>

    <div class="bg-property-slider-2 bg-no-repeat bg-size-cover">
        <div class="property">
            <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                <div class="container p-top-100">
                    <div class="clearfix"></div>
                    <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">50 000 000 FCFA</h2>
                    <h5>
                        <a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10" href="#">
                            Villa Le Baobab
                        </a>
                    </h5>
                    <p class="text-white">Rue 233, Quartier Médine, Ségou</p>
                </div>
                <div class="overlay bg-bg opacity-9"></div>
            </div>
        </div>
    </div>

    <div class="bg-property-slider-3 bg-no-repeat bg-size-cover">
        <div class="property">
            <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                <div class="container p-top-100">
                    <div class="clearfix"></div>
                    <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">100 000 FCFA/Mois</h2>
                    <h5>
                        <a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10" href="#">
                            Immeuble Le Soudan
                        </a>
                    </h5>
                    <p class="text-white">Rue 448, Kayes Plateau</p>
                </div>
                <div class="overlay bg-bg opacity-9"></div>
            </div>
        </div>
    </div>
</div>

@php
// Filtrer une seule propriété par agence (maximum 3)
$proprietesUniques = collect();
$agencesDejaAjoutees = [];

foreach ($proprietes as $propriete) {
    if (!in_array($propriete->agence_id, $agencesDejaAjoutees)) {
        $proprietesUniques->push($propriete);
        $agencesDejaAjoutees[] = $propriete->agence_id;
    }
    if ($proprietesUniques->count() === 3) break;
}
@endphp

<div id="proprietes" class="container mt-4">
    <div class="row">
        @foreach ($proprietesUniques as $propriete)
        {{-- Vérifier si la propriété est disponible, louée ou vendue --}}
        @if (in_array($propriete->statut, ['disponible','louee','vendu']))
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

                    {{-- Badge de statut --}}
                    <div class="position-absolute top-0 start-0 m-2">
                        @php
                            $color = 'secondary';
                            switch($propriete->statut){
                                case 'disponible': $color = 'success'; break;
                                case 'louee': $color = 'danger'; break;
                                case 'vendu': $color = 'danger'; break;
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
                    <h6>{{ $propriete->nom ?? 'Nom de la propriété' }}</h6>
                    <p class="text-muted mb-2"><i class="fa fa-map-marker-alt me-1"></i> {{ $propriete->adresse }}</p>
                    <div class="d-flex justify-content-between text-secondary small">
                        <span><i class="fa fa-bed me-1"></i> {{ $propriete->nombre_de_chambres }} Chambres</span>
                        <span><i class="fa fa-bath me-1"></i> {{ $propriete->salle_de_bains }} SDB</span>
                        <span><i class="fa fa-building me-1"></i> {{ $propriete->agence->name ?? 'Agence inconnue' }}</span>
                    </div>
                    <div class="text-center mt-2">
                        <a href="{{ route('propriete.show', $propriete->id) }}" class="btn btn-outline-primary w-100">
                            Voir détails
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<script>
    function ajouterFavori(btn) {
        btn.classList.toggle('btn-light');
        btn.classList.toggle('btn-danger');
        const icon = btn.querySelector('i');
        icon.classList.toggle('fa-heart');
        icon.classList.toggle('fa-heart-circle-check');
    }
</script>


<!-- End: PROPERTY -
    ################################################################## -->

<!--
    #################################
        - Begin: SERVICES -
    #################################
    -->
<div class="bg-white p-bottom-30">
    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-4 m-top-40 m-bottom-40">

                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i
                            class="fa fa-building-o bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Appartements</h4>
                        <p>Nos appartements sont conçus pour vous offrir bien plus qu’un simple logement : un véritable chez-vous. Spacieux, modernes et lumineux, ils allient design raffiné et commodités haut de gamme pour un cadre de vie exceptionnel.</p>

                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-4 m-top-40 m-bottom-40">

                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i
                            class="fa fa-shield bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Bureaux</h4>
                        <p>Nos bureaux sont conçus pour booster la productivité et refléter le sérieux de votre activité. Profitez d’un environnement calme, sécurisé et parfaitement équipé, idéal pour recevoir vos clients et faire évoluer votre équipe.</p>

                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-4 m-top-40 m-bottom-40">

                <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                    <div class="media">
                        <i
                            class="fa fa-bullhorn bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                    </div>
                    <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                        <h4 class="m-bottom-15 text-bold-700">Maisons</h4>
                        <p>Découvrez nos magnifiques maisons prêtes à vous accueillir. Que vous soyez à la recherche d’un cadre paisible, d’un espace fonctionnel pour votre famille ou d’un bon investissement, nos offres sont faites pour vous.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
<!-- End: SERVICES -
    ################################################################## -->


<!--
    #################################
        - Begin: AGENCIES -
    #################################
    -->
<div class="container">

    <h2 class="text-bold-700 m-bottom-10">Les meilleures agences</h2>

    <p class="text-size-18 m-bottom-40">Faites confiance aux meilleures agences pour vos projets immobiliers !
        Acheter, louer ou investir ? Ne laissez rien au hasard. Avec notre expertise, notre professionnalisme et notre parfaite connaissance du marché, nous faisons de votre satisfaction une priorité absolue.</p>

   <style>
    /* Forcer la même hauteur pour toutes les cards */
    .agency {
        min-height: 180px; /* Ajuste la hauteur selon ton design */
    }
</style>

<div class="row">

    <!-- AGENCY 1 -->
    <div class="col-lg-6 col-md-6 d-flex">
        <div class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30 flex-fill d-flex flex-column">
            <div class="row flex-fill">
                <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                    <div class="agency-media position-relative">
                        <a class="d-block" href="#">
                            <img class="full-width" alt="Client" src="assets/images/clients/agence_logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                    <div class="agency-section position-relative h-100 d-flex flex-column justify-content-between">
                        <div class="agency-data m-top-0 m-bottom-20">
                            <h4 class="text-bold-700">
                                <a class="text-dark text-base-hover" href="#">Société Immobiliere Malienne</a>
                            </h4>
                            <p>Bamako, Magnambougou Faso Kanu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AGENCY 2 -->
    <div class="col-lg-6 col-md-6 d-flex">
        <div class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30 flex-fill d-flex flex-column">
            <div class="row flex-fill">
                <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                    <div class="agency-media position-relative">
                        <a class="d-block" href="#">
                            <img class="full-width" alt="Client" src="assets/images/clients/agence_logo1.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                    <div class="agency-section position-relative h-100 d-flex flex-column justify-content-between">
                        <div class="agency-data m-top-0 m-bottom-20">
                            <h4 class="text-bold-700">
                                <a class="text-dark text-base-hover" href="#">Agence Immobiliere Mali Kura SARL</a>
                            </h4>
                            <p>Bamako, Niamacoro‑Courani</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AGENCY 3 -->
    <div class="col-lg-6 col-md-6 d-flex">
        <div class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30 flex-fill d-flex flex-column">
            <div class="row flex-fill">
                <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                    <div class="agency-media position-relative">
                        <a class="d-block" href="#">
                            <img class="full-width" alt="Client" src="assets/images/clients/agence_logo2.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                    <div class="agency-section position-relative h-100 d-flex flex-column justify-content-between">
                        <div class="agency-data m-top-0 m-bottom-20">
                            <h4 class="text-bold-700">
                                <a class="text-dark text-base-hover" href="#">Centrale Immobiliere Du Mali</a>
                            </h4>
                            <p>Bamako, Bacodjicoroni ACI / Golf</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AGENCY 4 -->
    <div class="col-lg-6 col-md-6 d-flex">
        <div class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30 flex-fill d-flex flex-column">
            <div class="row flex-fill">
                <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                    <div class="agency-media position-relative">
                        <a class="d-block" href="#">
                            <img class="full-width" alt="Client" src="assets/images/clients/logo_agence.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                    <div class="agency-section position-relative h-100 d-flex flex-column justify-content-between">
                        <div class="agency-data m-top-0 m-bottom-20">
                            <h4 class="text-bold-700">
                                <a class="text-dark text-base-hover" href="#">SE LOGER AU MALI</a>
                            </h4>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
@endsection