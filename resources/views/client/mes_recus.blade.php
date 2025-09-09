<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-color: #3366CC;
            --secondary-color: #6699FF;
            --light-color: #F8F9FA;
            --dark-color: #212529;
            --success-color: #28A745;
            --warning-color: #FFC107;
            --danger-color: #DC3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar-menu li a {
            text-decoration: none;
            color: inherit;
            flex: 1;
            display: block;
            padding: 5px 0;
        }

        .sidebar-menu li:hover a {
            color: var(--primary-color);
        }

        .sidebar-menu li.active a {
            color: white;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .profile-icon {
            width: 80px;
            height: 80px;
            background-color: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .profile-icon svg {
            width: 40px;
            height: 40px;
            fill: white;
        }

        .profile-header h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .profile-header p {
            color: #6c757d;
            margin-bottom: 20px;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .badge-primary {
            background-color: rgba(58, 80, 107, 0.1);
            color: var(--primary-color);
        }

        .profile-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .card h2 {
            font-size: 20px;
            margin-bottom: 20px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }

        .card h2 svg {
            margin-right: 10px;
            width: 20px;
            height: 20px;
            fill: var(--secondary-color);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-color);
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(91, 192, 190, 0.2);
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #2c3e50;
        }

        .properties-list {
            list-style: none;
        }

        .property-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .property-item:last-child {
            border-bottom: none;
        }

        .property-info h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .property-info p {
            font-size: 14px;
            color: #6c757d;
        }

        .property-status {
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .status-active {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .status-vacant {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        .status-rented {
            background-color: rgba(0, 123, 255, 0.1);
            color: #007BFF;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background: white;
            position: fixed;
            height: 100%;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            left: 0;
            top: 0;
        }

        .sidebar-header h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .sidebar-menu li.active {
            background-color: var(--primary-color);
            color: white;
        }

        .sidebar-menu li.active svg {
            fill: white;
        }

        .sidebar-menu li svg {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            fill: var(--secondary-color);
        }

        .sidebar-menu li:hover {
            background-color: #f5f7fa;
        }

        .sidebar-menu li:nth-last-child(2) {
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .sidebar-menu li:last-child {
            margin-bottom: 0;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }

            .main-content {
                width: 100%;
                margin-left: 0;
            }

            .sidebar-menu a.active {
                background-color: var(--primary-color);
                color: #fff;
                padding: 10px;
                border-radius: 5px;
                display: block;
            }


            .profile-content {
                grid-template-columns: 1fr;
            }

            .profile-header {
                padding: 20px;
            }
        }
         table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-telecharger {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-telecharger:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>kcPropriété</h3>
        </div>
        <ul class="sidebar-menu">
    <li class="{{ request()->routeIs('client.profil') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24">
            <path d="M12,12C14.21,12 16,10.21 16,8C16,5.79 14.21,4 12,4C9.79,4 8,5.79 8,8C8,10.21 9.79,12 12,12M12,14C9.33,14 4,15.34 4,18V20H20V18C20,15.34 14.67,14 12,14Z" />
        </svg>
        <a href="{{ route('client.profil') }}">Mon Profil</a>
    </li>
    <li class="{{ request()->routeIs('client.connexion_securite') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24">
            <path d="M12,15A2,2 0 0,1 10,13A2,2 0 0,1 12,11A2,2 0 0,1 14,13A2,2 0 0,1 12,15M12,17C9.24,17 7,14.76 7,12C7,9.24 9.24,7 12,7C14.76,7 17,9.24 17,12C17,14.76 14.76,17 12,17M12,4.5C7.14,4.5 3.17,7.61 3.17,11.5C3.17,15.39 7.14,18.5 12,18.5C16.86,18.5 20.83,15.39 20.83,11.5C20.83,7.61 16.86,4.5 12,4.5Z" />
        </svg>
        <a href="{{ route('client.connexion_securite') }}">Sécurité</a>
    </li>
    <li>
            <svg viewBox="0 0 24 24">
                <path d="M20,6H4V18H20V6M20,4A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4H20Z" />
            </svg>
            <a href="{{ route('client.mes_recus') }}">Mes reçus</a>
        </li>
    <li class="{{ request()->routeIs('accueil') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24">
            <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
        </svg>
        <a href="{{ route('accueil') }}">Page d'accueil</a>
    </li>
    <li>
        <svg viewBox="0 0 24 24">
            <path d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" />
        </svg>
        <a href="#" id="logout-link">Se déconnecter</a>
        <form id="logout-form" action="{{ route('client.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
    </div>
    <div class="main-content">
        <div class="container">
            <h2 style="text-align:center;">📄 Liste des Reçus</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Client</th>
            <th>Propriété</th>
            <th>Type</th>
            <th>Montant</th>
            <th>Fréquence</th>
            <th>Durée</th>
            <th>Statut</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recus as $data )
            <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->date_paiement }}</td>
            <td>{{ $data->user->name }}</td>
            <td>{{ $data->propriete->nom }}</td>
            <td>{{ $data->type }}</td>
            <td>{{ $data->montant }} FCFA</td>
            <td>{{ $data->frequence }}</td>
            <td>{{ $data->duree }}{{ $data->unite_duree}}</td>
            <td>{{ $data->status }}</td>
            <td><a class="btn-telecharger"  href="{{ route('agence.paiements.recu_pdf',$data->id) }}">Télécharger</a></td>
        </tr>
        @endforeach
        
    </tbody>
</table>
        </div>
    </div>
     <script>
    // Confirmation de mise à jour (pour boutons submit)
    document.querySelectorAll('.btn-primary').forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.closest('form')) return;
            alert('Vos informations ont été mises à jour');
        });
    });

    // Déconnexion réelle côté Laravel
    const logoutLink = document.getElementById('logout-link');
    if (logoutLink) {
        logoutLink.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Voulez-vous vraiment vous déconnecter ?')) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
</body>
