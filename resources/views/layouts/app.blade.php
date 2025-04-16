<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Application</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agence.dashboard') }}">Dashboard Agence</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.dashboard') }}">Dashboard Client</a>
                    </li> --}}
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Contenu principal de la page -->
    <div class="container">
        @yield('content')  <!-- Ici le contenu de chaque vue sera injecté -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
