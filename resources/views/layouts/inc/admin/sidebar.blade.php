<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
   /* Liens de la sidebar */
    .custom-sidebar-link {
        display: flex;
        align-items: center;
        gap: 10px;
        background-color: rgba(255, 255, 255, 0.05); 
        color: #ffffff;
        padding: 12px 16px;
        border-radius: 10px;
        font-weight: 500;
        font-size: 15px;
        margin-bottom: 8px;
        transition: background-color 0.3s ease, transform 0.2s ease, color 0.2s ease;
        text-decoration: none;
    }

    .custom-sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.15);
        transform: translateX(3px);
        color: #ffd700; /* couleur dorée au survol */
    }

    .custom-sidebar-link i {
        font-size: 18px;
        color: #ffffff;
        min-width: 20px;
        text-align: center;
        transition: color 0.2s ease;
    }

    .custom-sidebar-link:hover i {
        color: #ffd700; /* icône dorée au survol */
    }

    .sidebar-section-title {
        font-size: 11px;
        text-transform: uppercase;
        font-weight: bold;
        margin: 20px 0 10px 15px;
        padding-left: 8px;
        color: rgba(255, 255, 255, 0.8);
    }

    .metismenu a {
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .metismenu li a:hover {
        color: #ffd700;
    }
</style>

<div class="sidebar-nav scrollbar scroll_light">
<div class="d-flex align-items-center text-left px-2 mb-3 user-setting">
        <!-- Logo ou autre contenu -->
    </div>
    <ul class="metismenu" id="sidebarNav">
        <!-- Boutons du haut -->

        <li>
            <a href="{{ route('admin.dashboard') }}" class="custom-sidebar-link">
                <i class="fas fa-chart-line"></i>
                <span>Tableau de Bord</span>
            </a>
        </li>

        <!-- Section principale -->
        <li class="nav-section">
            <h3 class="sidebar-section-title">Menu principal</h3>
        </li>

        <!-- Agence avec sous-menu -->
        <li>
            <a class="custom-sidebar-link has-arrow {{ request()->is('admin/agence*') ? 'active' : '' }}" href="javascript:void(0)">
                <i class="fas fa-building"></i>
                <span class="nav-title">Agences</span>
            </a>
            <ul class="submenu">
                <li>
                    <a href="{{ route('admin.agence.create') }}" 
                       class="{{ request()->is('admin/agence/create') ? 'active-link' : '' }}">
                        <i class="fas fa-plus"></i> Ajouter une agence
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.agence.index') }}" 
                       class="{{ request()->is('admin/agence*') ? 'active-link' : '' }}">
                        <i class="fas fa-list"></i> Liste des agences
                    </a>
                </li>
            </ul>
        </li>

        <!-- Clients -->
        <li>
            <a href="{{ route('admin.client.index') }}" class="custom-sidebar-link {{ request()->is('admin/client*') ? 'active-link' : '' }}">
                <i class="fas fa-user-group"></i>
                <span class="nav-title">Clients</span>
            </a>
        </li>

        <!-- Propriétés -->
        <li>
            <a href="{{ route('admin.proprietes.index') }}" class="custom-sidebar-link {{ request()->is('admin/proprietes*') ? 'active-link' : '' }}">
                <i class="fas fa-building-columns"></i>
                <span class="nav-title">Propriétés</span>
            </a>
        </li>

        <!-- Paiements -->
        <li>
            <a href="{{ route('admin.paiements.index') }}" class="custom-sidebar-link {{ request()->is('admin/paiements*') ? 'active-link' : '' }}">
                <i class="fas fa-credit-card"></i>
                <span class="nav-title">Paiements</span>
            </a>
        </li>
    </ul>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Gérer le clic sur les éléments avec la classe 'has-arrow'
        $('.has-arrow').on('click', function() {
            $(this).toggleClass('active');
            $(this).next('.submenu').slideToggle();
        });

        // Ouvrir automatiquement le menu s'il contient un lien actif
        $('.submenu').each(function() {
            if ($(this).find('.active-link').length > 0) {
                $(this).show();
                $(this).prev('.has-arrow').addClass('active');
            }
        });
    });
</script>
