@extends('layouts.frontend')
@section('content')
<div class="bg-white box-shadow-1 z-index-10 position-relative p-top-60 p-bottom-30">
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <div class="clearfix">
                        <div class="badge badge-base text-white pull-left m-right-8 m-bottom-15 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0"></div>
                        <div class="badge badge-success pull-left m-bottom-15 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">A louer</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="m-bottom-30 clearfix">
                        <h2>{{ $propriete->nom }}</h2>
                        <p>{{ $propriete->adresse }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="m-bottom-30 text-right">
                        <h1 class="text-bold-700 text-base">{{ $propriete->prix }}FCFA</h1>
                        <p class=""></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-light-3 p-top-60 p-bottom-60">
        <div class="container">

            <div class="row">

                <!-- CONTENT -->
                <div class="col-lg-8 col-md-12">

                    <!-- SLIDER -->
                    <div class="row m-bottom-30">
                        <div class="col-md-12">
                            <div class="thumbnail-slider">
                                <div class="slick-thumbnail">
                                    <div>
                                        <a data-fancybox="slider" href="{{ asset('assets/images/property/property-1.jpg') }}">
                                            <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-1.jpg') }}">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="{{ asset('assets/images/property/property-2.jpg') }}">
                                            <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-2.jpg') }}">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="{{ asset('assets/images/property/property-3.jpg') }}">
                                            <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-3.jpg') }}">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="{{ asset('assets/images/property/property-4.jpg') }}">
                                            <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-4.jpg') }}">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="{{ asset('assets/images/property/property-5.jpg') }}">
                                            <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-5.jpg') }}">
                                        </a>
                                    </div>
                                    <div>
                                        <a data-fancybox="slider" href="{{ asset('assets/images/property/property-6.jpg') }}">
                                            <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-6.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="slick-thumbnail-nav thumbnails">
                                    <div>
                                        <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-1.jpg') }}">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-2.jpg') }}">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-3.jpg') }}">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-4.jpg') }}">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-5.jpg') }}">
                                    </div>
                                    <div>
                                        <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-6.jpg') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /SLIDER -->
                    
                    <!-- DESCTIPTION -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">DESCRIPTION</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                                <p>{{ $propriete->description }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /DESCTIPTION -->
                    
                    <!-- ADDRESS -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">ADDRESSE</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <div class="row m-bottom-30">
                                    <div class="col-md-12">
                                        <div class="row m-bottom-10">
                                            <div class="col-6"><strong>Addresse:</strong></div>
                                            <div class="col-6 text-right">{{ $propriete->adresse }}</div>
                                        </div>
                                        <div class="row m-bottom-10">
                                            <div class="col-6"><strong>Pays:</strong></div>
                                            <div class="col-6 text-right">{{ $propriete->pays }}</div>
                                        </div>
                                        <div class="row m-bottom-10">
                                            <div class="col-6"><strong>Ville:</strong></div>
                                            <div class="col-6 text-right">{{ $propriete->ville }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6"><strong>Quartier:</strong></div>
                                            <div class="col-6 text-right">{{ $propriete->quartier }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="googlemapsMarkers" class="google-map mt-none mb-lg height-280"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /ADDRESS -->
                      <!-- DETAIL -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">DETAILS</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Type:</strong></div>
                                            <div class="col-7 text-right">{{ $propriete->type }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Proposition:</strong></div>
                                            <div class="col-7 text-right">{{ $propriete->proposition }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Nombre_de_chambres:</strong></div>
                                            <div class="col-7 text-right">{{$propriete->nombre_de_chambres }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Salle de bains:</strong></div>
                                            <div class="col-7 text-right">{{ $propriete->salle_de_bains }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Telephone:</strong></div>
                                            <div class="col-7 text-right">(123) 456 7890</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-5"><strong>Année de construction:</strong></div>
                                            <div class="col-7 text-right">{{ $propriete->annee_de_construction}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /DETAIL -->
                    
                    <!-- AMENITIES -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">COMMODITES</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                               <ul class="icon-list list-col-3 clearfix">
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Climatisation</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Balcon</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Literie</li>
                                    <li>
                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Télévision par cable</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Nettoyage apres le départ</li>
                                    <li>
                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Cafetiere</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Ordinateur</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Lit bébé</li>
                                    <li>
                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Lave-vaisselle</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>DVD</li>
                                    <li>
                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Ventilateur</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Réfrigérateur</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Barbecue</li>
                                    <li>
                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Seche-cheveux</li>
                                    <li>
                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Chauffage</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Chaine hi-fi</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Internet</li>
                                    <li>
                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Fer a repasser</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Extracteur de jus</li>
                                    <li>
                                        <i class="btn btn-secondary rounded-0 fa fa-close"></i>Ascenseur</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Micro-ondes</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Salle de sport</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Cheminée</li>
                                    <li>
                                        <i class="btn btn-base rounded-0 fa fa-check"></i>Jacuzzi</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!-- /AMENITIES -->
                    
                    <!-- FACILITIES -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">INFRASTRUCTURES</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Centre commercial:</strong></div>
                                            <div class="col-4 text-right">1 km</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Hopital:</strong></div>
                                            <div class="col-4 text-right">10 min</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Ecole:</strong></div>
                                            <div class="col-4 text-right">10 min</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Station service:</strong></div>
                                            <div class="col-4 text-right">5 min</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row m-bottom-10">
                                            <div class="col-8"><strong>Aéroport:</strong></div>
                                            <div class="col-4 text-right">10 km</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-8"><strong>Mosquée:</strong></div>
                                            <div class="col-4 text-right">2 min</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /FACILITIES -->
                    
                    <!-- VALUATION -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">EVALUATION</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                    
                                <div class="row">
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Criminalité</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="20%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Circulation</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="75%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip">75%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Pollution</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="85%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip">85%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Education</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="97%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip">97%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 m-bottom-15">
                                        <div class="progress-label">
                                            <div class="text-bold-600 m-bottom-5">Santé</div>
                                        </div>
                                        <div class="progress bg-light rounded-0">
                                            <div class="progress-bar bg-base rounded-0" data-appear-progress-animation="80%" data-appear-animation-delay="300">
                                                <span class="progress-bar-tooltip">80%</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /VALUATION -->
                    
                    <!-- FLOOR PLANS -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">PLANS D'ETAGE</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Premiere etage</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Deuxieme etage</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                        <p>Nulla nec tempor pharetra, diam turpis sollicitudin ex, quis tristique orci justo et nisl. Nullam efficitur ex vel mi malesuada, sit amet maximus felis laoreet. Sed urna mauris, eleifend nec felis auctor, rhoncus dictum tellus. Integer lacinia ut justo id finibus. Proin mattis, urna in pulvinar condimentum.</p>
                                        <img alt="..." class="full-width" src="{{ asset('assets/images/floors/floor-1.jpg') }}">
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                        <p>Nullam efficitur ex vel mi malesuada, sit amet maximus felis laoreet. Sed urna mauris, eleifend nec felis auctor, rhoncus dictum tellus. Integer Nulla nec tempor pharetra diam turpis sollicitudin ex, quis tristique orci justo et nisl. lacinia ut justo id finibus. Proin mattis, urna in pulvinar condimentum.</p>
                                        <img alt="..." class="full-width" src="{{ asset('assets/images/floors/floor-2.jpg') }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /FLOOR PLANS -->
                    
                    <!-- AGENT -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-50">
                            <div class="bg-white card-body p-top-30 p-bottom-30 p-left-30 p-right-30 box-shadow-1">
                                <h3 class="text-bold-700 m-bottom-10">AGENT</h3>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                    
                                <div class="row">
                                    <div class="agent col-md-4 col-sm-12 match-height vcenter">
                                        <div class="agent-media position-relative">
                                            <a class="d-block" href="#">
                                                <img class="full-width" alt="Agent" src="{{ asset('assets/images/agents/agent-1.jpg') }}">
                                            </a>
                                            <div class="media-data">
                                                <div class="position-top">
                                                    <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">32 Propriétes</div>
                                                </div>
                                                <div class="position-bottom">
                                                    <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                                        <i class="fa fa-building-o m-right-4"></i>
                                                        MK Builders
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 match-height vcenter">
                                        <div class="agent-section position-relative p-top-10 p-right-15 p-left-15 p-top-30-sm p-bottom-25-sm">
                                            <div class="agent-data m-top-0 m-bottom-20">
                                                <h4 class="text-uppercase text-bold-700"><a href="#" class="text-base">David Smith</a></h4>
                                                <p class="designation">123 Smith Dr, Annapolis, MD</p>
                                            </div>
                                            <ul class="icon-list">
                                                <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Buying Agent</li>
                                                <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> jdoe@homely.com</li>
                                                <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                                            </ul>
                                            <div class="p-top-10 p-right-15 p-bottom-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-left-15 p-right-15 m-right-4" href="#">Agent Detail</a>
                                                        <a class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 m-bottom-10 p-left-15 p-right-15 m-right-4" href="#">Contact Agent</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /AGENT -->
                    
                    <!-- SIMILAR PROPERTIES -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <h3 class="text-bold-700 m-bottom-10">PROPRIETES SIMILAIRES</h3>
                    
                            <div class="hr dark text-left m-bottom-20">
                                <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                <div class="icons text-light">
                                    <i class="fa fa-circle-o"></i>
                                    <i class="fa fa-circle-o"></i>
                                    <i class="fa fa-circle-o"></i>
                                </div>
                                <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                            </div>
                
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="property bg-white m-bottom-30 box-shadow-1 box-shadow-3-hover">
                                        <div class="property-media overlay-wrapper">
                                            <img class="full-width" src="{{ asset('assets/images/property/property-1.jpg') }}" alt="Property 1">
                                            <div class="media-data">
                                                <div class="position-bottom">
                                                    <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                    <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                                    <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 12</div>
                                                </div>
                                            </div>
                                            <div class="overlay bg-bg opacity-9"></div>
                                        </div>
                                        <div class="property-section p-left-15 p-right-15">
                                            <div class="m-top-20 m-bottom-20">
                                                <h2 class="text-base text-bold-700 m-top-15">$250,000 <small class="text-size-14 text-muted">Per Month</small></h2>
                                                <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Beautiful Small Apartment</a></h5>
                                                <p>253 Lake Washington, USA</p>
                                                <ul class="icon-list list-inline m-bottom-0">
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-bed"></i> 5 Beds</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-tint"></i> 3 Baths</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-expand"></i> 36,000 Sq Ft</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bg-light-3 text-size-13 text-muted p-top-15 p-right-15 p-bottom-15 p-left-15">
                                            <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                <li><i class="m-right-4 fa fa-calendar"></i> 1 day ago</li>
                                                <li><a href="#"><i class="m-right-4 fa fa-heart-o"></i> Favorate</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="property bg-white m-bottom-30 box-shadow-1 box-shadow-3-hover">
                                        <div class="property-media overlay-wrapper">
                                            <img class="full-width" src="{{ asset('assets/images/property/property-3.jpg') }}" alt="Property 3">
                                            <div class="media-data">
                                                <div class="position-bottom">
                                                    <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                    <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                                    <div class="text-white text-size-18 pull-right"><i class="fa fa-camera"></i> 14</div>
                                                </div>
                                            </div>
                                            <div class="overlay bg-bg opacity-9"></div>
                                        </div>
                                        <div class="property-section p-left-15 p-right-15">
                                            <div class="m-top-20 m-bottom-20">
                                                <h2 class="text-base text-bold-700 m-top-15">$145,000 <small class="text-size-14 text-muted">Per Month</small></h2>
                                                <h5><a class="text-bold-600 text-dark text-base-hover" href="#">Global Land House</a></h5>
                                                <p>110 Lake, United Kingdom</p>
                                                <ul class="icon-list list-inline m-bottom-0">
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-bed"></i> 6 Beds</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-tint"></i> 3 Baths</li>
                                                    <li class="list-inline-item"><i class="btn btn-base fa fa-expand"></i> 65,000 Sq Ft</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bg-light-3 text-size-13 text-muted p-top-15 p-right-15 p-bottom-15 p-left-15">
                                            <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                <li><i class="m-right-4 fa fa-calendar"></i> 3 weeks ago</li>
                                                <li><a href="#"><i class="m-right-4 fa fa-heart-o"></i> Favorate</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /SIMILAR PROPERTIES -->

                </div>
                <!-- /CONTENT -->

                <!-- SIDEBAR -->
                <div class="col-lg-4 col-md-12">
                    
                    <!-- ENQUIRY FORM -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-20 box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">FORMULAIRE DE RENSEIGNEMENT</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-0" placeholder="Nom">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control rounded-0" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-0" placeholder="Telephone">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control rounded-0" rows="4" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I agree to the <a href="#">Terms and Conditions</a>.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-left-15 p-right-15" value="Envoyer">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                      <!-- /ENQUIRY FORM -->
                    
                    <!-- AGENT ENQUIRY FORM -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-20 box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">CONTACT AGENT</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>
                                
                                <!-- AGENT -->
                                <div class="agent bg-white m-bottom-10">
        
                                    <div class="agent-media">
                                        <a class="d-block" href="#">
                                            <img alt="..." class="full-width" src="{{ asset('assets/images/agents/agent-1.jpg') }}">
                                        </a>
                                        <div class="media-data">
                                            <div class="position-top">
                                                <div class="badge badge-base text-white pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">32 Propriétés</div>
                                            </div>
                                            <div class="position-bottom">
                                                <a class="btn btn-white text-bold-600 text-spacing-5 text-size-13 pull-left line-height-18 rounded-0" href="#">
                                                    <i class="fa fa-building-o m-right-4"></i>
                                                    MK Builders
                                                </a>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="agent-section p-top-25 p-bottom-25">
                                        <h5 class="text-uppercase text-bold-700"><a href="#" class="text-base">David Smith</a></h5>
                                        <p>253 Lake Washington, USA</p>
                                        <ul class="icon-list m-bottom-25">
                                            <li><i class="btn btn-base rounded-0 fa fa-flag"></i> Buying Agent</li>
                                            <li><i class="btn btn-base rounded-0 fa fa-envelope"></i> david@iproperty.com</li>
                                            <li><i class="btn btn-base rounded-0 fa fa-phone"></i> (123) 456-6789</li>
                                        </ul>
                                        <ul class="social-icons">
                                            <li>
                                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a class="btn btn-base btn-sm rounded-0" href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
        
                                </div>
                                <!-- /AGENT -->

                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-0" placeholder="Nom">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control rounded-0" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control rounded-0" placeholder="Telephone">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control rounded-0" rows="4" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-left-15 p-right-15" value="Envoyer">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /AGENT ENQUIRY FORM -->
                    
                    <!-- RECENTLY VIEW -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-20 box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">RECEMMENT VUS</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <ul class="media-list">
                                    <li>
                                        <img alt="..." class="media-img" src="{{ asset('assets/images/property/property-1-150x130.jpg') }}">
                                        <div class="media-content">
                                            <h5 class="text-bold-700 text-base">$250,000</h5>
                                            <h6><a class="text-dark text-base-hover" href="#">Beautiful Small Apartment</a></h6>
                                            <p class="address">253 Lake Washington, USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img alt="..." class="media-img" src="{{ asset('assets/images/property/property-2-150x130.jpg') }}">
                                        <div class="media-content">
                                            <h5 class="text-bold-700 text-base">$120,000</h5>
                                            <h6><a class="text-dark text-base-hover" href="#">Beautiful Garaes Condo</a></h6>
                                            <p class="address">154 Drive, New York</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img alt="..." class="media-img" src="{{ asset('assets/images/property/property-3-150x130.jpg') }}">
                                        <div class="media-content">
                                            <h5 class="text-bold-700 text-base">$145,000</h5>
                                            <h6><a class="text-dark text-base-hover" href="#">Global Land House</a></h6>
                                            <p class="address">110 Lake, United Kingdom</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /RECENTLY VIEW -->
                    
                    <!-- FEATURED PROPERTIES -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-20 box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">PROPRIETES A LA UNE</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <div class="single-slider slick-single">
                                    <div>
                                        <div class="property m-bottom-15">
                                            <div class="property-media overlay-wrapper">
                                                <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-1.jpg') }}">
                                                <div class="media-data">
                                                    <div class="position-top">
                                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    </div>
                                                    <div class="position-bottom">
                                                        <h2 class="text-white m-bottom-0 text-bold-700 pull-left">$250,000</h2>
                                                        <div class="clearfix"></div>
                                                        <p class="text-white m-bottom-0 pull-left">Per Month</p>
                                                        <div class="text-white text-size-18 pull-right line-height-0"><i class="fa fa-camera"></i> 12</div>
                                                    </div>
                                                </div>
                                                <div class="overlay bg-bg opacity-9"></div>
                                            </div>
                                            <div class="property-section">
                                                <div class="m-top-20 m-bottom-20">
                                                    <h5><a class="text-dark text-base-hover" href="#">Beautiful Small Apartment</a></h5>
                                                    <p>253 Lake Washington, USA</p>
                                                </div>
                                                <div class="bg-light-3 p-top-10 p-right-15 p-bottom-10 p-left-15">
                                                    <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                        <li><i class="m-right-4 fa fa-bed"></i> 5 Beds</li>
                                                        <li><i class="m-right-4 fa fa-tint"></i> 3 Baths</li>
                                                        <li><i class="m-right-4 fa fa-expand"></i> 36,000 Sq Ft</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="property m-bottom-15">
                                            <div class="property-media overlay-wrapper">
                                                <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-2.jpg') }}">
                                                <div class="media-data">
                                                    <div class="position-top">
                                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Sale</div>
                                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    </div>
                                                    <div class="position-bottom">
                                                        <h2 class="text-white m-bottom-0 text-bold-700 pull-left">$120,000</h2>
                                                        <div class="clearfix"></div>
                                                        <p class="text-white m-bottom-0 pull-left">Per Month</p>
                                                        <div class="text-white text-size-18 pull-right line-height-0"><i class="fa fa-camera"></i> 6</div>
                                                    </div>
                                                </div>
                                                <div class="overlay bg-bg opacity-9"></div>
                                            </div>
                                            <div class="property-section">
                                                <div class="m-top-20 m-bottom-20">
                                                    <h5><a class="text-dark text-base-hover" href="#">Beautiful Garaes Condo</a></h5>
                                                    <p>154 Drive, New York</p>
                                                </div>
                                                <div class="bg-light-3 p-top-10 p-right-15 p-bottom-10 p-left-15">
                                                    <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                        <li><i class="m-right-4 fa fa-bed"></i> 4 Beds</li>
                                                        <li><i class="m-right-4 fa fa-tint"></i> 2 Baths</li>
                                                        <li><i class="m-right-4 fa fa-expand"></i> 45,000 Sq Ft</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="property m-bottom-15">
                                            <div class="property-media overlay-wrapper">
                                                <img alt="..." class="full-width" src="{{ asset('assets/images/property/property-1.jpg') }}">
                                                <div class="media-data">
                                                    <div class="position-top">
                                                        <div class="badge badge-base text-white pull-left m-right-8 p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">Featured</div>
                                                        <div class="badge badge-success pull-left p-top-8 p-right-12 p-bottom-8 p-left-12 rounded-0">For Rent</div>
                                                        <div class="text-white text-size-24 pull-right"><a class="text-white text-base-hover" href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    </div>
                                                    <div class="position-bottom">
                                                        <h2 class="text-white m-bottom-0 text-bold-700 pull-left">$145,000</h2>
                                                        <div class="clearfix"></div>
                                                        <p class="text-white m-bottom-0 pull-left">Per Month</p>
                                                        <div class="text-white text-size-18 pull-right line-height-0"><i class="fa fa-camera"></i> 14</div>
                                                    </div>
                                                </div>
                                                <div class="overlay bg-bg opacity-9"></div>
                                            </div>
                                            <div class="property-section">
                                                <div class="m-top-20 m-bottom-20">
                                                    <h5><a class="text-dark text-base-hover" href="#">Global Land House</a></h5>
                                                    <p>110 Lake, United Kingdom</p>
                                                </div>
                                                <div class="bg-light-3 p-top-10 p-right-15 p-bottom-10 p-left-15">
                                                    <ul class="list-unstyled d-flex justify-content-between m-bottom-0">
                                                        <li><i class="m-right-4 fa fa-bed"></i> 6 Beds</li>
                                                        <li><i class="m-right-4 fa fa-tint"></i> 3 Baths</li>
                                                        <li><i class="m-right-4 fa fa-expand"></i> 65,000 Sq Ft</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /FEATURED PROPERTIES -->

                    <!-- PROPERTY TYPE -->
                    <div class="row">
                        <div class="col-md-12 m-bottom-30">
                            <div class="bg-white card-body p-20 box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">TYPE DE PROPRIETES</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <ul class="icon-list">
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Homes</a>
                                        <span>(10)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Plots</a>
                                        <span>(20)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Commercial</a>
                                        <span>(12)</span>
                                    </li>
                                    <li>
                                        <i class="btn btn-base fa fa-angle-double-right"></i>
                                        <a class="text-dark text-base-hover" href="#">Appartments</a>
                                        <span>(15)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /PROPERTY TYPE -->

                    <!-- RECENT POST -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white card-body p-20 box-shadow-1">
                                <h5 class="text-bold-700 m-bottom-10">RECENT POSTS</h5>
                    
                                <div class="hr dark text-left m-bottom-20">
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                    <div class="icons text-light">
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                        <i class="fa fa-circle-o"></i>
                                    </div>
                                    <hr class="border-3 border-double border-light border-left-0 border-top-0 border-right-0">
                                </div>

                                <ul class="media-list">
                                    <li>
                                        <img alt="..." class="media-img" src="{{ asset('assets/images/blog/blog-1-150x130.jpg') }}">
                                        <div class="media-content">
                                            <div class="meta m-bottom-5">
                                                <i class="fa fa-user text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">admin</a>
                                                <i class="fa fa-comments text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">24</a>
                                            </div>
                                            <h6><a class="text-base text-base-dark-hover" href="#">Fuisset partiendo quo cu sadipscing</a></h6>
                                            <div class="meta">
                                                <i class="fa fa-calendar text-muted"></i> 25, Jan 2017
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <img alt="..." class="media-img" src="{{ asset('assets/images/blog/blog-2-150x130.jpg') }}">
                                        <div class="media-content">
                                            <div class="meta m-bottom-5">
                                                <i class="fa fa-user text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">admin</a>
                                                <i class="fa fa-comments text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">24</a>
                                            </div>
                                            <h6><a class="text-base text-base-dark-hover" href="#">Fuisset partiendo quo cu sadipscing</a></h6>
                                            <div class="meta">
                                                <i class="fa fa-calendar text-muted"></i> 25, Jan 2017
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <img alt="..." class="media-img" src="{{ asset('assets/images/blog/blog-3-150x130.jpg') }}">
                                        <div class="media-content">
                                            <div class="meta m-bottom-5">
                                                <i class="fa fa-user text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">admin</a>
                                                <i class="fa fa-comments text-muted"></i>
                                                <a class="text-dark text-base-hover" href="#">24</a>
                                            </div>
                                            <h6><a class="text-base text-base-dark-hover" href="#">Fuisset partiendo quo cu sadipscing</a></h6>
                                            <div class="meta">
                                                <i class="fa fa-calendar text-muted"></i> 25, Jan 2017
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /RECENT POST -->

                </div>
                <!-- /SIDEBAR -->

            </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/common/common.min.js') }}"></script>

    <!-- MAIN MENU -->
    <script src="{{ asset('assets/vendors/menu/js/vendors-menu.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/menu/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/vendors/menu/js/app-menu.js') }}"></script>

    <!-- MAP -->
    <script src="{{ asset('assets/vendors/gmap/jquery.axgmap.js') }}"></script>

    <!-- MASONRY -->
    <script src="{{ asset('assets/vendors/isotope/jquery.isotope.min.js') }}"></script>

    <!-- OWL CAROUSEL SLIDER -->
    <script src="{{ asset('assets/vendors/owl.carousel/js/owl.carousel.min.js') }}"></script>

    <!-- SILCK SLIDER -->
    <script src="{{ asset('assets/vendors/slick/slick.js') }}"></script>

    <!-- FANCY BOX -->
    <script src="{{ asset('assets/vendors/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- FILE-UPLOADER -->
    <script src="{{ asset('assets/vendors/fileuploader/js/jquery.fileuploader.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/fileuploader/js/custom.js') }}"></script>

    <!-- RANGE SLIDER -->
    <script src="{{ asset('assets/vendors/range-slider/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/vendors/range-slider/script.js') }}"></script>

    <!-- THEME-CUSTOM -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <!-- THEME-INITIALIZATION-FILES -->
    <script src="{{ asset('assets/js/theme.init.js') }}"></script>


    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyAyNHWwyAcLQYGLrK4N0TSeTiBxAUeXu4Q') }}"></script>
	<!-- Load the MarkerClusterer library -->
	<script src="{{ asset('../../developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js') }}"></script>
    <!-- <script>
        // Markers
        $("#googlemapsMarkers").gMap({
            controls: {
                draggable: (($.browser.mobile) ? false : true),
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: [{
                address: "217 Summit Boulevard, Birmingham, AL 35243",
                html: "<strong>Alabama Office</strong><br>217 Summit Boulevard, Birmingham, AL 35243",
                icon: {
                    image: "assets/images/map/pin.png",
                    iconsize: [54, 55],
                    iconanchor: [12, 46]
                }
            },{
                address: "645 E. Shaw Avenue, Fresno, CA 93710",
                html: "<strong>California Office</strong><br>645 E. Shaw Avenue, Fresno, CA 93710",
                icon: {
                    image: "assets/images/map/pin.png",
                    iconsize: [54, 55],
                    iconanchor: [12, 46]
                }
            },{
                address: "New York, NY 10017",
                html: "<strong>New York Office</strong><br>New York, NY 10017",
                icon: {
                    image: "assets/images/map/pin.png",
                    iconsize: [54, 55],
                    iconanchor: [12, 46]
                }
            }],
            latitude: 37.09024,
            longitude: -95.71289,
            zoom: 3
        });
    </script> -->
    </script>
        </div>
    </div>
    <!-- End: PROPERTY -
    ################################################################## -->

    <!--
    #################################
        - Begin: FOOTER -
    #################################
    -->
    
@endsection
