@extends('layouts.frontend')
@section('content')
    <div class="owl-carousel owl-theme owl-nav-wide"
        data-plugin-options="{'items': 1, 'margin': 10, 'nav': true, 'dots': false, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000}">
        <div class="bg-property-slider-1 bg-no-repeat bg-size-cover">
            <div class="property">
                <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                    <div class="container p-top-100">
                        <div
                            class="badge badge-success p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">
                            A vendre</div>
                        <div class="clearfix"></div>
                        <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">150 000 000 FCFA <small
                                class="text-size-18"></small></h2>
                        <h5><a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10"
                                href="#">Bel petit appartement</a></h5>
                        <p class="text-white">Rue 238 Bamako , MALI</p>
                    </div>
                    <div class="overlay bg-bg opacity-9"></div>
                </div>
            </div>
        </div>
        <div class="bg-property-slider-2 bg-no-repeat bg-size-cover">
            <div class="property">
                <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                    <div class="container p-top-100">
                        <div
                            class="badge badge-success p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">
                            A louer</div>
                        <div class="clearfix"></div>
                        <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">50 000 000 FCFA</h2>
                        <h5><a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10"
                                href="#">Jolie maison</a></h5>
                        <p class="text-white">Rue 233, Ségou</p>
                    </div>
                    <div class="overlay bg-bg opacity-9"></div>
                </div>
            </div>
        </div>
        <div class="bg-property-slider-3 bg-no-repeat bg-size-cover">
            <div class="property">
                <div class="property-media overlay-wrapper p-top-100 p-bottom-50">
                    <div class="container p-top-100">
                        <div
                            class="badge badge-success p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 text-size-14 m-bottom-20">
                            A vendre</div>
                        <div class="clearfix"></div>
                        <h2 class="text-white text-bold-600 text-size-50 text-size-40-sm m-bottom-10">145 000 000 FCFA<small
                                class="text-size-18"></small></h2>
                        <h5><a class="text-white text-bold-500 text-size-30 text-size-25-sm text-white text-white-hover m-bottom-10"
                                href="#">Maison cool</a></h5>
                        <p class="text-white">Rue 448, Kayes</p>
                    </div>
                    <div class="overlay bg-bg opacity-9"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: SLIDER -
    ################################################################## -->

    <!--
    #################################
        - Begin: PROPERTY -
    #################################
    -->


   @php
    // Filtrer une seule propriété par agence
    $proprietesUniques = collect();
    $agencesDejaAjoutees = [];

    foreach ($proprietes as $propriete) {
        if (!in_array($propriete->agence_id, $agencesDejaAjoutees)) {
            $proprietesUniques->push($propriete);
            $agencesDejaAjoutees[] = $propriete->agence_id;
        }

        if ($proprietesUniques->count() === 3) {
            break;
        }
    }
@endphp
<div id="proprietes" class="container mt-4">
    <div class="row">
        @foreach ($proprietesUniques as $propriete)
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

                        <div class="position-absolute top-0 end-0 p-2">
                            <button class="btn btn-light rounded-circle shadow-sm" onclick="ajouterFavori(this)">
                                <i class="fa fa-heart"></i>
                            </button>
                        </div>

                        <div class="position-absolute bottom-0 start-0 m-2">
                            @if ($propriete->featured)
                                <span class="badge bg-primary me-1">Featured</span>
                            @endif
                            <span class="badge bg-success">{{ $propriete->etat }}</span>
                        </div>

                        <div class="position-absolute bottom-0 end-0 m-2 text-white">
                            <i class="fa fa-camera"></i> {{ $propriete->images->count() }}
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="text-primary">{{ $propriete->prix }} <small class="text-muted">FCFA</small></h5>
                        <h6>{{ $propriete->titre }}</h6>
                        <p class="text-muted mb-2"><i class="fa fa-map-marker-alt me-1"></i> {{ $propriete->adresse }}</p>
                        <div class="d-flex justify-content-between text-secondary small">
                            <span><i class="fa fa-bed me-1"></i> {{ $propriete->chambres }} Chambres</span>
                            <span><i class="fa fa-bath me-1"></i> {{ $propriete->salles_bain }} SDB</span>
                            <span><i class="fa fa-ruler-combined me-1"></i> {{ $propriete->agence->nom }} Agence</span>
                            
                        </div>
                         <div class="text-center">
                       <a href="{{ route('client.show', $propriete->id) }}" class="btn btn-outline-primary w-100">
                        Voir détails
                       </a>
                    </div>
                    </div>
                </div>
                 <!-- Bouton Voir détails -->
                  
            </div>
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
                            <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut
                                imperdiet venenatis vitae justo.</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="#">Read More <i
                                    class="fa fa-long-arrow-right"></i></a>
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
                            <h4 class="m-bottom-15 text-bold-700">Commercial</h4>
                            <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut
                                imperdiet venenatis vitae justo.</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="#">Read More <i
                                    class="fa fa-long-arrow-right"></i></a>
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
                            <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut
                                imperdiet venenatis vitae justo.</p>
                            <a class="text-base text-base-dark-hover text-size-13" href="#">Read More <i
                                    class="fa fa-long-arrow-right"></i></a>
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

        <p class="text-size-18 m-bottom-40">Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim
            justo rhoncus ut</p>

        <div class="row">

            <!-- AGENCY -->
            <div class="col-lg-6 col-md-6">

                <div
                    class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                            <div class="agency-media position-relative">
                                <a class="d-block" href="#">
                                    <img class="full-width" alt="Client" src="assets/images/clients/logo-1.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                            <div class="agency-section position-relative">
                                <div class="agency-data m-top-0 m-bottom-20">
                                    <div
                                        class="badge badge-base text-white pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Properties
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">22</span>
                                    </div>
                                    <div
                                        class="badge badge-success pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Featured
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">10</span>
                                    </div>
                                    <div
                                        class="badge badge-warning pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Agents
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">8</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">MK
                                            Builders</a></h4>
                                    <p>253 Lake Washington, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /AGENCY -->

            <!-- AGENCY -->
            <div class="col-lg-6 col-md-6">

                <div
                    class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                            <div class="agency-media position-relative">
                                <a class="d-block" href="#">
                                    <img class="full-width" alt="Client" src="assets/images/clients/logo-2.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                            <div class="agency-section position-relative">
                                <div class="agency-data m-top-0 m-bottom-20">
                                    <div
                                        class="badge badge-base text-white pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Properties
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">22</span>
                                    </div>
                                    <div
                                        class="badge badge-success pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Featured
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">10</span>
                                    </div>
                                    <div
                                        class="badge badge-warning pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Agents
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">8</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4 class="text-bold-700"><a class="text-dark text-base-hover"
                                            href="#">Real Estate</a></h4>
                                    <p>154 Drive, New York</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /AGENCY -->

            <!-- AGENCY -->
            <div class="col-lg-6 col-md-6">

                <div
                    class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                            <div class="agency-media position-relative">
                                <a class="d-block" href="#">
                                    <img class="full-width" alt="Client" src="assets/images/clients/logo-3.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                            <div class="agency-section position-relative">
                                <div class="agency-data m-top-0 m-bottom-20">
                                    <div
                                        class="badge badge-base text-white pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Properties
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">22</span>
                                    </div>
                                    <div
                                        class="badge badge-success pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Featured
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">10</span>
                                    </div>
                                    <div
                                        class="badge badge-warning pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Agents
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">8</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">The
                                            Big City</a></h4>
                                    <p>110 Lake, United Kingdom</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /AGENCY -->

            <!-- AGENCY -->
            <div class="col-lg-6 col-md-6">

                <div
                    class="agency bg-light-2 box-shadow-1 box-shadow-2-hover border-1 border-solid border-light p-top-30 p-left-30 p-right-30 m-bottom-30">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 p-bottom-15">
                            <div class="agency-media position-relative">
                                <a class="d-block" href="#">
                                    <img class="full-width" alt="Client" src="assets/images/clients/logo-4.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12 p-bottom-15">
                            <div class="agency-section position-relative">
                                <div class="agency-data m-top-0 m-bottom-20">
                                    <div
                                        class="badge badge-base text-white pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Properties
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">22</span>
                                    </div>
                                    <div
                                        class="badge badge-success pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Featured
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">10</span>
                                    </div>
                                    <div
                                        class="badge badge-warning pull-left m-right-20 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0 m-bottom-20">
                                        Agents
                                        <span
                                            class="badge badge-white box-shadow-3 text-dark border-1 border-light">8</span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h4 class="text-bold-700"><a class="text-dark text-base-hover" href="#">SK
                                            Home</a></h4>
                                    <p>103 Occidental Washington USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
