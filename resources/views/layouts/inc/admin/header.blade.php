<header class="app-header top-bar">
    <!-- begin navbar -->
    <nav class="navbar navbar-expand-lg">

        <!-- Mobile header -->
        <div class="navbar-header align-items-center d-lg-none d-block">
            <a href="javascript:void(0)" class="mobile-toggle">
                <i class="ti ti-align-right"></i>
            </a>
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/default-logo.png') }}" class="img-fluid logo-desktop" alt="logo" />
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti ti-align-left"></i>
        </button>

        <!-- begin navigation -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navigation d-flex">

                <!-- Left nav -->
                <ul class="navbar-nav nav-left">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                            <i class="ti ti-align-right"></i>
                        </a>
                    </li>
                    <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                        <a href="javascript:void(0)" class="nav-link expand">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                    </li>
                </ul>

                <div class="ml-auto mr-3 d-none d-xl-block">
                    <!-- Zone recherche si besoin -->
                </div>

                @php
                    $user = auth()->user();
                    $nonLues = $user ? $user->notifications()->whereNull('read_at')->count() : 0;
                    $notifications = $user ? $user->notifications()->latest()->take(5)->get() : collect();
                @endphp

                <!-- Right nav -->
                <ul class="navbar-nav nav-right ml-auto ml-xl-0">

                    <!-- Notifications -->
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-bell"></i>
                            @if($nonLues > 0)
                                <span class="badge badge-danger position-absolute" style="top: 0; right: 0; font-size: 10px;">
                                    {{ $nonLues }}
                                </span>
                            @endif
                        </a>

                        <div class="dropdown-menu extended animated fadeIn dropdown-menu-right" aria-labelledby="notifDropdown" style="min-width: 300px;">
                            <ul>
                                <li class="dropdown-header p-3 text-white bg-overlay-primary-70">
                                    <span class="h5 font-weight-bold">Notifications</span>
                                </li>
                                <li class="dropdown-body">
                                    <ul class="scrollbar scroll_dark max-h-240 list-unstyled m-0 p-0">
                                        @forelse($notifications as $notif)
                                            <li>
                                                <a href="{{ route('admin.notification.show', $notif->id) }}"
                                                   class="dropdown-item d-flex flex-row align-items-start {{ $notif->read_at ? '' : 'font-weight-bold' }}">
                                                    <div class="notify-icon avatar avatar-md align-self-center mr-3">
                                                        <i class="ti ti-bell text-primary" style="font-size: 24px;"></i>
                                                    </div>
                                                    <div class="notify-message">
                                                        <p class="mb-1">{{ $notif->data['titre'] ?? 'Notification' }}</p>
                                                        <small class="text-muted">{{ \Str::limit($notif->data['contenu'] ?? '', 50) }}</small>
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                            <li>
                                                <span class="dropdown-item text-muted">Aucune notification</span>
                                            </li>
                                        @endforelse
                                    </ul>
                                </li>
                                <li class="dropdown-footer text-center">
                                    <a href="{{ route('admin.notification.index') }}" class="font-13">Voir toutes</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Profil Admin -->
                    @if($user)
                        <li class="nav-item dropdown user-profile">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" id="navbarDropdown4" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex align-items-center text-left">
                                    <div class="mr-2">
                                        <h6 class="mb-0">{{ $user->name }}</h6>
                                        <small class="d-block">Admin</small>
                                    </div>
                                    <div class="avatar position-relative">
                                        @if($user->logo)
                                            <img src="{{ asset('storage/' . $user->logo) }}" class="rounded-circle" width="40" height="40" alt="Logo Admin">
                                        @else
                                            <img src="{{ asset('images/default-agency.png') }}" class="rounded-circle" width="40" height="40" alt="Logo par défaut">
                                        @endif
                                        <span class="bg-success user-status"></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown4">
                                <div class="px-4 py-3 bg-holder bg-overlay-primary-70"
                                     style="background-image: url('{{ $user->logo ? asset('storage/' . $user->logo) : asset('admin/assets/img/blog/05.jpg') }}'); background-size: contain; background-repeat: no-repeat; background-position: center;">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-1">
                                            <h5 class="text-white mb-0">{{ $user->name }}</h5>
                                            <small class="text-white">{{ $user->email }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <a class="dropdown-item d-flex nav-link" href="{{ route('admin.profil.index') }}">
                                        <i class="far fa-user pr-1 text-success"></i> Profil
                                    </a>
                                    <a class="dropdown-item d-flex nav-link" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="far fa-compass pr-1 text-warning"></i> Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
        <!-- end navigation -->
    </nav>
    <!-- end navbar -->
</header>