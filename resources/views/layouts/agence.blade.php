<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/arioxa/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:46:41 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Agence</title>

    <link rel="shortcut icon" href="{{ asset('admin/assets/img/favicon.ico') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&amp;display=swap" rel="stylesheet">

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/jquery-ui/jquery-ui.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/metisMenu/metisMenu.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/jvectormap/jqvmap.min.css') }}"   />
    <link rel="stylesheet" href="{{asset('admin/assets/css/datatables/datatables.min.css')}}">

    <!-- Template Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}" />

</head>

<body>
     <style>
        .logo-desktop {
    width: 70%; /* ou une valeur en % */
    height: auto;
}
    </style>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{asset('admin/assets/img/loader/loader.svg')}}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->
            <!-- begin app-header -->
            @include('layouts.inc.agence.header')
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin navbar-header -->
                    <div class="navbar-header align-items-center d-lg-block d-none">
                        <a class="navbar-brand" href="{{ route('agence.dashboard') }}">
                            <img src="{{ asset('admin/assets/img/gestion.png') }}" class="logo-desktop" alt="logo" />
                            <img src="{{asset('admin/assets/img/logo-icon.png')}}" class="img-fluid logo-mobile" alt="logo" />
                        </a>
                    </div>
                    <!-- begin sidebar-nav -->
                    @include('layouts.inc.agence.sidebar')
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        @yield('content')
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <!-- begin footer -->
            <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <p></p>
                    </div>
                    <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                        <p>Développé par Affouchatou & Hawishka<i class="fas fa-heart text-danger mx-1"></i> </p>
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        </div>
        <!-- end app -->

        <!--=================================
    Java-script -->

        <!-- JS Global Compulsory (Do not remove)-->
        <script src="{{ asset('admin/assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/popper/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.min.js') }}"></script>

        <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature) -->
        <script src="{{ asset('admin/assets/js/metisMenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jvectormap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jvectormap/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('admin/assets/js/datatables/datatables.min.js') }}"></script>

        <!-- Template Scripts (Do not remove) -->
        <script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/arioxa/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:46:41 GMT -->

</html>