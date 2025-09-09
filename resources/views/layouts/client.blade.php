<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kcProperty - Espace Client</title>

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/utility.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link href="{{ asset('assets/css/colors/blue.css') }}" type="text/css" media="all" rel="stylesheet" id="colors" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/menu/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl.carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fileuploader/css/jquery.fileuploader.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fileuploader/css/jquery.fileuploader-theme-thumbnails.css') }}" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body data-menu="header-main-menu" class="bg-white body-main-menu header-main-menu">

    <header class="main-header bg-light-2 box-shadow-1">
        <a href="#" class="nav-link nav-menu-main menu-toggle btn btn-base rounded-0">
            <i class="fa fa-bars"></i>
        </a>

        <div class="inner-header d-flex align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
                        <a class="navbar-brand logo" href="{{ route('accueil') }}">
                            <img class="full-width" style="max-width: 300px;" alt="kcProperty" src="{{ asset('assets/images/logo11.png') }}">
                        </a>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 text-right">
                        <div class="extra-info">
                            <ul class="d-flex justify-content-end gap-4">
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

        <div role="navigation" data-menu="menu-wrapper" class="header-navbar navbar bg-base-dark navbar-fixed box-shadow-3">
            <div data-menu="menu-container" class="container navbar-container main-menu-content">
                <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                    <li data-menu="dropdown" class="nav-item {{ Request::routeIs('accueil') ? 'active' : '' }}">
                        <a href="{{ route('accueil') }}" class=" nav-link"><i class="fa fa-home"></i> <span>Accueil Public</span></a>
                    </li>
                    <li data-menu="dropdown" class="nav-item {{ Request::routeIs('client.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('client.dashboard') }}" class=" nav-link"><i class="fa fa-tachometer"></i> <span>Mon Tableau de Bord</span></a>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item {{ Request::routeIs('client.propriete') ? 'active' : '' }}">
                        <a href="{{ route('client.propriete') }}" class=" nav-link"><i class="fa fa-building-o"></i><span>Propriétés Disponibles</span></a>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item {{ Request::routeIs('client.requete') ? 'active' : '' }}">
                        <a href="{{ route('client.requete') }}" class=" nav-link"><i class="fa fa-paper-plane-o"></i> <span>Mes Demandes</span></a>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item {{ Request::routeIs('client.paiement') ? 'active' : '' }}">
                        <a href="{{ route('client.paiement') }}" class=" nav-link"><i class="fa fa-credit-card"></i> <span>Mes Paiements</span></a>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item {{ Request::routeIs('client.profil') ? 'active' : '' }}">
                        <a href="{{ route('client.profil') }}" class=" nav-link"><i class="fa fa-user"></i> <span>Mon Profil</span></a>
                    </li>

                    @auth
                    {{-- Ajoutez un lien pour la déconnexion --}}
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa fa-sign-out"></i> <span>Se Déconnecter</span>
                            </a>
                        </form>
                    </li>
                    @endauth

                    @guest
                    <li data-menu="dropdown" class="dropdown nav-item {{ Request::routeIs('client.register') ? 'active' : '' }}">
                        <a href="{{ route('client.register') }}" class=" nav-link"><i class="fa fa-user-plus"></i> <span>Créer un compte</span></a>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item {{ Request::routeIs('login') ? 'active' : '' }}">
                        <a href="{{ route('login') }}" class=" nav-link"><i class="fa fa-sign-in"></i> <span>Se Connecter</span></a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="footer">
        <div class="bg-dark p-top-60 p-bottom-30">
            <div class="container">
                <div class="row m-bottom-40 p-bottom-40 border-bottom border-secondary">
                    <div class="col-md-6 d-flex align-items-center">
                        <h4 class="text-white font-weight-bold m-0">kcPropriété</h4>
                        <span class="text-white ml-3">/ Achat Vente Immobilier au Mali</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <ul class="social-icons m-top-15">
                            <li><a class="btn btn-base rounded-0" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="btn btn-base rounded-0" href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="btn btn-base rounded-0" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="btn btn-base rounded-0" href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 m-bottom-30">
                        <h5 class="border-left: 4px solid white; padding-left: 10px;">Pays Populaires</h5>
                        <ul class="icon-list">
                            <li><i class="fa fa-angle-double-right text-base"></i> Mali <span class="float-right">(30)</span></li>
                            <li><i class="fa fa-angle-double-right text-base"></i> Sénégal <span class="float-right">(15)</span></li>
                            <li><i class="fa fa-angle-double-right text-base"></i> Côte d’Ivoire <span class="float-right">(12)</span></li>
                            <li><i class="fa fa-angle-double-right text-base"></i> Burkina Faso <span class="float-right">(9)</span></li>
                            <li><i class="fa fa-angle-double-right text-base"></i> Niger <span class="float-right">(7)</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 m-bottom-30">
                        <h5 class="text-white text-uppercase text-bold-700 m-bottom-30">Nous Contacter</h5>
                        <p class="text-white">Adresse : Hamdallaye ACI 2000, Bamako, Mali</p>
                        <p class="text-white">Téléphone : (+223) 82-82-78-71</p>
                        <p class="text-white">Email :
                            <a href="mailto:contact@ipropriete.ml" class="text-base border-bottom border-light">affouCoulibaly742@gmail.com
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-12 m-bottom-30">
                        <h5 class="text-white text-uppercase text-bold-700 m-bottom-30">Newsletter</h5>
                        <form>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="form-control rounded-0" placeholder="Votre adresse e-mail">
                                    <div class="input-group-append">
                                        <button class="btn btn-base rounded-0" type="submit">
                                            <i class="fa fa-envelope"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted">Inscrivez-vous à notre newsletter pour recevoir nos nouvelles offres et projets.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-base p-top-30 p-bottom-20">
            <div class="container text-center">
                <p class="text-white m-0">© 2025 <a href="#" class="text-white border-bottom border-light">kcPropriété</a>. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/menu/js/vendors-menu.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/menu/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/vendors/menu/js/app-menu.js') }}"></script>
    <script src="{{ asset('assets/vendors/gmap/jquery.axgmap.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl.carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/vendors/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/fileuploader/js/jquery.fileuploader.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/fileuploader/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/theme.init.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhpYHdYRY2U6V_VfyyNtkPHhywLjDkhfg"></script>
    <script>
        // Markers Google Maps (ajustez les adresses si nécessaire)
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
                    image: "{{ asset('assets/images/map/pin.png') }}", // Utilisez asset()
                    iconsize: [54, 55],
                    iconanchor: [12, 46]
                }
            }],
            latitude: 37.09024,
            longitude: -95.71289,
            zoom: 3
        });
    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/switcher/css/demo.css') }}" media="all" />
    <script src="{{ asset('assets/vendors/switcher/js/demo.js') }}"></script>
    <script src="{{ asset('assets/vendors/switcher/js/jquery.cookie.js') }}"></script>
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
</body>
</html>