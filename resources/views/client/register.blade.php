

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Formulaire d'inscription client" />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Inscription</title>

    <link rel="shortcut icon" href="{{ asset('admin/admin/assets/img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/jquery-ui/jquery-ui.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/metisMenu/metisMenu.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}" />
</head>

<body class="bg-white">
    <div class="app">
        <div class="app-wrap">
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ asset('admin/assets/img/loader/loader.svg') }}" alt="loader">
                    </div>
                </div>
            </div>

            <div class="app-contant">
                <div class="container">
                    <div class="row justify-content-center align-items-center h-100-vh">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center">
                                <div class="login pt-4">
                                    <h1 class="mb-2">Inscription Client</h1>
                                    <p>Pour accéder à votre compte.</p>
                                    <form method="POST" action="{{ route('client.register') }}" class="mt-3 mt-sm-5">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Prénom</label>
                                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Entrez votre prénom" required />
                                                    @error('prenom')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nom</label>
                                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Entrez votre nom" required />
                                                    @error('nom')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Email*</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="exemple@email.com" required />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Mot de passe*</label>
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" required />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Confirmer le mot de passe*</label>
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="********" required />
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <button type="submit" class="btn btn-light text-uppercase">S'inscrire</button>
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
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('admin/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    


</body>
</html>
