<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from immersivesoul.com/iproperty/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:44:19 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>iProperty | Real Estate Bootstarp Template</title>

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <link href="{{ asset('https://fonts.googleapis.com/css?family=Varela+Round') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/utility.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/responsive.css') }}">

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
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2">
                        <!-- LOGO -->
                        <a class="navbar-brand logo" href="index.html">
                            <img class="full-width max-width-130-sm max-width-130-md" alt="iProperty"
                                src="/assets/images/logo.png">
                        </a>
                        <!-- /LOGO -->
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 text-right">
                        <div class="extra-info">
                            <ul>
                                <li class="m-top-5 hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-phone text-base text-size-30"></i>
                                    <div class="text">
                                        <div class="text-top text-weight-400 text-muted text-size-13">
                                            CONTACTEZ-NOUS
                                        </div>
                                        <div class="text-bottom text-bold-700 text-black">
                                            (223) 82-82-78-71
                                        </div>
                                    </div>
                                </li>
                                <li class="m-top-5 hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-envelope-o text-base text-size-30"></i>
                                    <div class="text">
                                        <div class="text-top text-bold-400 text-muted text-size-13">
                                            EMAIL
                                        </div>
                                        <div class="text-bottom text-bold-700 text-black">
                                            AffouCoulibaly742@gmail.com
                                        </div>
                                    </div>
                                </li>
                                <li class="m-top-5 hidden-xs hidden-sm hidden-md">
                                    <i class="fa fa-clock-o text-base text-size-30"></i>
                                    <div class="text">
                                        <div class="text-top text-bold-400 text-muted text-size-13">
                                            NOUS SOMMES OUVERTS
                                        </div>
                                        <div class="text-bottom text-bold-700 text-black">
                                            Lundi - Samadi
                                        </div>
                                    </div>
                                </li>
                                 <li class="hidden-xs hidden-sm">
                                    <a href="{{url('agence/login')}}"
                                        class="btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13 p-top-12 p-bottom-12 p-left-15 p-right-15 text-size-11-lg">Connexion Agence</a>
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

                <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                    <li data-menu="dropdown" class="nav-item active">
                        <a href="home" class=" nav-link"><i
                                class="fa fa-home"></i> <span>Accueil</span></a>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="#proprietes" class=" nav-link"><i
                                class="fa fa-building-o"></i><span>Propriétés</span></a>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="" class=" nav-link"><i
                                class="fa fa-id-badge"></i> <span>Agences</span></a>
                    </li>
                    @guest('client')
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="{{ route('client.register') }}" class=" nav-link"><i
                                class="fa fa-user-plus"></i> <span>Créer un compte</span></a>
                    </li>
                    <li data-menu="dropdown" class="dropdown nav-item">
                        <a href="{{ route('client.login') }}" class=" nav-link"><i
                                class="fa fa-sign-in"></i> <span>Se Connecter</span></a>
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
        <div class="bg-dark p-top-60 p-bottom-30">
            <div class="container">

                <div class="row">

                    <div class="col-md-12">
                        <div
                            class="border-1 border-solid border-dark border-top-0 border-left-0 border-right-0 p-bottom-40 m-bottom-40">

                            <div class="row">

                                <div class="col-md-6">
                                    <!-- Begin: LOGO -->
                                    <a class="navbar-brand logo" href="index.html">
                                        <img class="full-width max-width-140 m-right-10" alt="iProperty"
                                            src="assets/images/logo-white.png">
                                    </a>
                                    <span class="text-white">/ Real Buying Selling Property House</span>
                                    <!-- End: LOGO -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Begin: SOCIAL -->
                                    <ul class="social-icons m-top-15 text-right">
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#" target="_blank"><i
                                                    class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#" target="_blank"><i
                                                    class="fa fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#" target="_blank"><i
                                                    class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#" target="_blank"><i
                                                    class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-base rounded-0" href="#" target="_blank"><i
                                                    class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                    <!-- End: SOCIAL -->
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="m-bottom-30">

                            <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Latest Listing</h5>

                            <div class="row">
                                <div class="col-md-12">

                                    <ul class="media-list">
                                        <li>
                                            <img alt="..." class="media-img"
                                                src="assets/images/property/property-1-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$250,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Beautiful
                                                        Small Apartment</a></h6>
                                                <p class="address text-muted">253 Lake Washington, USA</p>
                                            </div>
                                        </li>
                                        <li>
                                            <img alt="..." class="media-img"
                                                src="assets/images/property/property-2-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$120,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Beautiful
                                                        Garaes Condo</a></h6>
                                                <p class="address text-muted">154 Drive, New York</p>
                                            </div>
                                        </li>
                                        <li>
                                            <img alt="..." class="media-img"
                                                src="assets/images/property/property-3-150x130.jpg">
                                            <div class="media-content">
                                                <h5 class="text-bold-700 text-base">$145,000</h5>
                                                <h6><a class="text-white text-base-hover" href="#">Global Land
                                                        House</a></h6>
                                                <p class="address text-muted">110 Lake, United Kingdom</p>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="m-bottom-30">

                            <h5 class="text-bold-700 m-bottom-26 text-white text-uppercase">Popular Countries</h5>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">

                                    <ul class="icon-list m-bottom-20">
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">France</a>
                                            <span class="text-base float-right">(10)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">United States</a>
                                            <span class="text-base float-right">(20)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">China</a>
                                            <span class="text-base float-right">(12)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Spain</a>
                                            <span class="text-base float-right">(15)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Poland</a>
                                            <span class="text-base float-right">(25)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Italy</a>
                                            <span class="text-base float-right">(10)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Turkey</a>
                                            <span class="text-base float-right">(20)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">United Kingdom</a>
                                            <span class="text-base float-right">(12)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Germany</a>
                                            <span class="text-base float-right">(15)</span>
                                        </li>
                                        <li>
                                            <i class="btn btn-base fa fa-angle-double-right"></i>
                                            <a class="text-white text-base-hover" href="#">Singapore</a>
                                            <span class="text-base float-right">(25)</span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="m-bottom-30">

                            <div class="row">

                                <div class="col-lg-12 col-md-6">
                                    <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Contact Us</h5>

                                    <div class="row m-bottom-20">
                                        <div class="col-md-12">

                                            <p class="text-white">Address: 253 Lake Washington, USA</p>
                                            <p class="text-white">Phone: (123) 123-456</p>
                                            <p class="text-white">E-Mail: <a
                                                    class="text-base border-1 border-dotted border-light border-top-0 border-left-0 border-right-0"
                                                    href="#">office@example.com</a></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">

                                    <h5 class="text-bold-700 m-bottom-30 text-white text-uppercase">Newsletter</h5>

                                    <div class="row m-bottom-20">
                                        <div class="col-md-12">

                                            <form>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="email"
                                                            class="form-control form-control-lg rounded-0 bg-white text-size-14"
                                                            placeholder="Enter your email">
                                                        <button type="submit"
                                                            class="input-group-addon btn btn-base rounded-0 text-bold-600 text-spacing-5 text-uppercase text-size-13  p-top-12 p-bottom-12 p-left-20 p-right-20"><i
                                                                class="fa fa-envelope"></i></button>
                                                    </div>
                                                </div>
                                                <p class="text-muted">Subscribe to our newsletter and we will inform
                                                    you about newset projects and promotions</p>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="bg-base p-top-30 p-bottom-20">
            <div class="container">
                <p class="text-white m-bottom-6">© Copyright 2017 <a
                        class="text-white border-1 border-dotted border-light border-top-0 border-left-0 border-right-0"
                        href="index.html">iProperty</a>. All Rights Reserved.</p>
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
    @if (session('client_name'))
    <div>
        Bonjour, {{ session('client_name') }}
        <form method="POST" action="{{ route('deconnexion') }}" style="display:inline;">
            @csrf
            <button type="submit">Déconnexion</button>
        </form>
    </div>
    @else
    <a href="{{ route('register') }}">Créer un compte</a> |
    <a href="{{ route('register') }}">Se connecter</a>
    @endif


</body>

<!-- Mirrored from immersivesoul.com/iproperty/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:44:47 GMT -->

</html>