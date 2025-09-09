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
            <a href="{{ route('agence.dashboard') }}" class="custom-sidebar-link">
                <i class="fas fa-chart-line"></i>
                <span>Tableau de Bord</span>
            </a>
        </li>

        <!-- Section principale -->
        <li class="nav-section">
            <h3 class="sidebar-section-title">Menu principal</h3>
        </li>

        <li>
            <a href="{{ route('agence.propriete.index') }}" class="custom-sidebar-link">
                <i class="fas fa-building-columns"></i>
                <span>Propriétés</span>
            </a>
        </li>
        <li>
            <a href="{{ route('agence.clients.index') }}" class="custom-sidebar-link">
                <i class="fas fa-user-group"></i>
                <span>Clients</span>
            </a>
        </li>
        <li>
            <a href="{{ route('agence.transactions.index') }}" class="custom-sidebar-link">
                <i class="fas fa-credit-card"></i>
                <span>Paiements</span>
            </a>
        </li>
    </ul>
</div>
