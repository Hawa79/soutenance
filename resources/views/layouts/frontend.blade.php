@php
use App\Models\Notification as UserNotification;
use App\Models\User;
@endphp

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from immersivesoul.com/iproperty/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:44:19 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>kcProperty</title>

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('https://fonts.googleapis.com/css?family=Varela+Round') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/utility.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- THEME COLOR -->
    <link href="{{ asset('/assets/css/colors/blue.css') }}" type="text/css" media="all" rel="stylesheet"
        id="colors" />

    <!-- MAIN MENU -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/menu/css/bootstrap-extended.css') }}">

    <!-- OWL CAROUSEL SLIDER -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/assets/vendors/owl.carousel/css/owl.carousel.min.css') }}">

    <!-- SLICK SLIDER -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/slick/slick-theme.css') }}">

    <!-- FANCY BOX -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/fancybox/jquery.fancybox.min.css') }}">

    <!-- FILE-UPLOADER -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/fileuploader/css/jquery.fileuploader.css') }}"
        media="all">
    <link rel="stylesheet"
        href="{{ asset('/assets/vendors/fileuploader/css/jquery.fileuploader-theme-thumbnails.css') }}" media="all">
</head>
<style>
    .no-outline {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        background: none !important;
    }

    .nav-item.active>.nav-link {
        background-color: #2563eb;
        color: white;
        font-weight: bold;
    }
</style>

<body data-menu="header-main-menu" class="bg-white body-main-menu header-main-menu">

    <!--
    #################################
        - Begin: HEADER -
    #################################
    -->
    <header class="main-header bg-light-2 box-shadow-1">

        <!-- TOGGLE -->
        <a href="#" class="nav-link nav-menu-main menu-toggle btn btn-base rounded-0">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /TOGGLE -->

        <!-- TOPBAR -->
        <div class="inner-header d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center"> <!-- Ajouté align-items-center ici -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
                        <!-- LOGO -->
                        <a class="navbar-brand logo" href="{{ route('accueil') }}">
                            <img class="full-width" style="max-width: 300px;" alt="iProperty"
                                src="/assets/images/logo11.png">
                        </a>
                        <!-- /LOGO -->
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 text-right">
                        <div class="extra-info">
                            <ul class="d-flex justify-content-end gap-4"> <!-- Ajout de flex pour bien répartir -->
                                <li class="d-flex align-items-center hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-phone text-base text-size-30 me-2"></i>
                                    <div class="text text-start">
                                        <div class="text-top text-weight-400 text-muted text-size-13">CONTACTEZ-NOUS</div>
                                        <div class="text-bottom text-bold-700 text-black">(223) 82-82-78-71</div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-envelope-o text-base text-size-30 me-2"></i>
                                    <div class="text text-start">
                                        <div class="text-top text-bold-400 text-muted text-size-13">EMAIL</div>
                                        <div class="text-bottom text-bold-700 text-black">AffouCoulibaly742@gmail.com</div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-clock-o text-base text-size-30 me-2"></i>
                                    <div class="text text-start">
                                        <div class="text-top text-bold-400 text-muted text-size-13">NOUS SOMMES OUVERTS</div>
                                        <div class="text-bottom text-bold-700 text-black">Lundi - Samedi</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /TOPBAR -->

        <!-- NAVIGATION -->
        <div role="navigation" data-menu="menu-wrapper"
            class="header-navbar navbar bg-base-dark navbar-fixed box-shadow-3">

            <!-- MENU CONTENT -->
<div data-menu="menu-container" class="container navbar-container main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav w-100">

        <li data-menu="dropdown" class="nav-item {{ Route::is('accueil') ? 'active' : '' }}">
            <a href="{{ route('accueil') }}" class="nav-link">
                <i class="fa fa-home"></i> <span>Accueil</span>
            </a>
        </li>

        <li data-menu="dropdown" class="dropdown nav-item {{ Route::is('propriete.locationVente.index') ? 'active' : '' }}">
            <a href="{{ route('propriete.locationVente.index') }}" class="nav-link">
                <i class="fa fa-building-o"></i><span> Propriétés</span>
            </a>
        </li>
@auth
    @if(Auth::user()->type !== 1) 
        <li data-menu="dropdown" class="dropdown nav-item {{ Request::is('agences*') ? 'active' : '' }}">
            <a href="{{ route('agences.index') }}" class="nav-link">
                <i class="fa fa-id-badge"></i><span> Agences</span>
            </a>
        </li>
    @endif
@else
    {{-- Utilisateur non connecté (invité) : afficher le lien agences --}}
    <li data-menu="dropdown" class="dropdown nav-item {{ Request::is('agences*') ? 'active' : '' }}">
        <a href="{{ route('agences.index') }}" class="nav-link">
            <i class="fa fa-id-badge"></i><span> Agences</span>
        </a>
    </li>
@endauth


        @auth
            @if(Auth::user()->type === 2)
                <li class="dropdown nav-item">
                    <a href="{{ route('client.profil') }}" class="nav-link">
                        <i class="fa fa-user"></i>
                        <span>{{ Auth::user()->name }} {{ Auth::user()->prenom ?? '' }}</span>
                    </a>
                </li>
            @endif
            @auth
    @if(Auth::user()->type !== 1) 
           <li class="dropdown nav-item">
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
               @endif
@else
<li class="dropdown nav-item">
                <a href="{{ route('logout') }}" class="nav-link"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endauth
        @endauth

        @guest
            <li class="dropdown nav-item {{ Route::is('client.register') ? 'active' : '' }}">
                <a href="{{ route('client.register') }}" class="nav-link">
                    <i class="fa fa-user-plus"></i>
                    <span>Créer un compte</span>
                </a>
            </li>

            <li class="dropdown nav-item {{ Route::is('login') ? 'active' : '' }}">
                <a href="{{ route('login') }}" class="nav-link">
                    <i class="fa fa-sign-in"></i>
                    <span>Se Connecter</span>
                </a>
            </li>
        @endguest

    </ul>
</div>
            <!-- /MENU CONTENT -->

        </div>
        <!-- /NAVIGATION -->

    </header>

    @yield('content')
<footer class="footer">
    <div class="bg-dark pt-5 pb-4">
        <div class="container">

            <!-- Bande supérieure : logo + réseaux sociaux -->
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-secondary pb-3">
                <!-- Logo et slogan -->
                <div class="d-flex align-items-center">
                    <h4 class="text-white fw-bold m-0">kcPropriété</h4>
                    <span class="text-white ms-3">/ Achat Vente Immobilier au Mali</span>
                </div>

                <!-- Réseaux sociaux -->
                <div>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a class="btn btn-primary rounded-0" href="#"><i class="fa fa-facebook text-white"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-primary rounded-0" href="#"><i class="fa fa-instagram text-white"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-primary rounded-0" href="#"><i class="fa fa-twitter text-white"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-primary rounded-0" href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="row text-start">

                <!-- À propos -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-white fw-bold mb-3">À propos</h5>
                    <p class="text-white-50 small">
                        Chez <span class="text-white fw-bold">kcPropriété</span>, nous connectons biens, agences et clients avec simplicité et confiance.
                    </p>
                    <p class="text-warning fst-italic small mt-2">
                        "Des projets clairs, une expérience sûre."
                    </p>
                </div>

                <!-- Contact -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-white fw-bold mb-3">Nous Contacter</h5>
                    <p class="text-white-50 small">
                        <i class="fas fa-map-marker-alt me-2 text-primary"></i> 
                        Hamdallaye ACI 2000, Bamako, Mali
                    </p>
                    <p class="text-white-50 small">
                        <i class="fas fa-phone-alt me-2 text-primary"></i> 
                        (+223) 82-82-78-71
                    </p>
                    <p class="text-white-50 small">
                        <i class="fas fa-envelope me-2 text-primary"></i> 
                        <a href="mailto:affouCoulibaly742@gmail.com" class="text-white-50 text-decoration-underline">
                            affouCoulibaly742@gmail.com
                        </a>
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="text-white fw-bold mb-3">Notre engagement</h5>
                    <p class="text-white-50 small">
                        <i class="fas fa-quote-left me-2 text-primary"></i>
                        "Simplifier la gestion immobilière tout en inspirant confiance."
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Pied de page -->
    <div class="bg-primary py-3">
        <div class="container text-center">
            <p class="text-white mb-0">© 2025 <a href="#" class="text-white text-decoration-underline">kcPropriété</a>. Tous droits réservés.</p>
        </div>
    </div>
</footer>


    

    <!-- End: FOOTER -
    ################################################################## -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendors/appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/vendors/common/common.min.js"></script>

    <!-- MAIN MENU -->
    <script src="assets/vendors/menu/js/vendors-menu.min.js"></script>
    <script src="assets/vendors/menu/js/jquery.sticky.js"></script>
    <script src="assets/vendors/menu/js/app-menu.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- MAP -->
    <script src="assets/vendors/gmap/jquery.axgmap.js"></script>

    <!-- MASONRY -->
    <script src="assets/vendors/isotope/jquery.isotope.min.js"></script>

    <!-- OWL CAROUSEL SLIDER -->
    <script src="{{ asset('assets/vendors/owl.carousel/js/owl.carousel.min.js') }}"></script>

    <!-- SILCK SLIDER -->
    <script src="assets/vendors/slick/slick.js"></script>

    <!-- FANCY BOX -->
    <script src="assets/vendors/fancybox/jquery.fancybox.min.js"></script>

    <!-- FILE-UPLOADER -->
    <script src="assets/vendors/fileuploader/js/jquery.fileuploader.min.js"></script>
    <script src="assets/vendors/fileuploader/js/custom.js"></script>

    <!-- THEME-CUSTOM -->
    <script src="assets/js/main.js"></script>

    <!-- THEME-INITIALIZATION-FILES -->
    <script src="assets/js/theme.init.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhpYHdYRY2U6V_VfyyNtkPHhywLjDkhfg"></script>
    <script>
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
            }, {
                address: "645 E. Shaw Avenue, Fresno, CA 93710",
                html: "<strong>California Office</strong><br>645 E. Shaw Avenue, Fresno, CA 93710",
                icon: {
                    image: "assets/images/map/pin.png",
                    iconsize: [54, 55],
                    iconanchor: [12, 46]
                }
            }, {
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
    </script>

    <!-- SWITCHER | BEGIN -->
    <div class='style-switcher' id='style-switcher'>
        <div class='style-switcher-heading'>
            <!-- SWITCHER COLORS -->
            <div class='custom_icon'>
                <i class='fa fa-cog c_rotating text-base'></i>
            </div>
        </div>
        <div class='style-switcher-body'>
            <div class='style-switcher-colors'>
                <div class='style-switcher-title'>Color Scheme</div>
                <a class='style-switcher-color limegreen' data-switch-target='#colors'
                    data-switch-to='limegreen.css' href='#' title="LimeGreen"></a>
                <a class='style-switcher-color golden' data-switch-target='#colors' data-switch-to='golden.css'
                    href='#' title="Golden"></a>
                <a class='style-switcher-color autumn' data-switch-target='#colors' data-switch-to='autumn.css'
                    href='#' title="Autumn"></a>
                <a class='style-switcher-color blue active' data-switch-default data-switch-target='#colors'
                    data-switch-to='blue.css' href='#' title="Blue"></a>
                <a class='style-switcher-color skyblue' data-switch-target='#colors' data-switch-to='skyblue.css'
                    href='#' title="Skyblue"></a>
                <a class='style-switcher-color cherry' data-switch-target='#colors' data-switch-to='cherry.css'
                    href='#' title="Cherry"></a>
                <a class='style-switcher-color orange' data-switch-target='#colors' data-switch-to='orange.css'
                    href='#' title="Orange"></a>
                <a class='style-switcher-color pink' data-switch-target='#colors' data-switch-to='pink.css'
                    href='#' title="Pink"></a>
                <a class='style-switcher-color purple' data-switch-target='#colors' data-switch-to='purple.css'
                    href='#' title="Purple"></a>
                <a class='style-switcher-color alphagreen' data-switch-target='#colors'
                    data-switch-to='alphagreen.css' href='#' title="AlphaGreen"></a>
            </div>
            <div class='style-switcher-reset'>
                <a class='style-switcher-button btn-base' data-switch-target='#style-switcher'
                    data-switch-to='reset:defaults' href='#' title="">Reset to defaults</a>
            </div>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendors/switcher/css/demo.css') }}" media="all" />
    <script src="{{ asset('/assets/vendors/switcher/js/demo.js') }}"></script>
    <script src="{{ asset('/assets/vendors/switcher/js/jquery.cookie.js') }}"></script>
    <!-- SWITCHER | END -->

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-70250779-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('modals')

</body>

<!-- Mirrored from immersivesoul.com/iproperty/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:44:47 GMT -->

</html>