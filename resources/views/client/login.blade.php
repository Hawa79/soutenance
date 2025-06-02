<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/arioxa/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:47:15 GMT -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Connexion</title>

    <!-- app favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/admin/assets/img/favicon.ico') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&amp;display=swap" rel="stylesheet">

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/jquery-ui/jquery-ui.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/metisMenu/metisMenu.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/assets/css/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}" />

    <!-- Template Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}" />

</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ asset('admin/assets/img/loader/loader.svg') }}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="container">
                    <div class="row justify-content-center align-items-center h-100-vh">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="login pt-4">
                                    <h1 class="mb-2">Connexion Client</h1>
                                    <p>Pour acceder a votre compte.</p>
                                    <form method="POST" action="{{ route('client.login.submit') }}" class="mt-3 mt-sm-5">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Email*</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Password*</label>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button type="submit" class="btn btn-light text-uppercase">Se Connecter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img class="img-fluid" src="{{ asset('admin/assets/img/bg/login.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!--=================================
    Java-script -->

    <!-- JS Global Compulsory (Do not remove) -->
    <script src="{{ asset('admin/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature) -->
    <script src="{{ asset('admin/assets/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- Template Scripts (Do not remove) -->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/arioxa/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jan 2025 17:47:16 GMT -->

</html>
