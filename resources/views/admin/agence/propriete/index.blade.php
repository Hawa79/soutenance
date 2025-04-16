@extends('layouts.agence')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <!-- Titre de la page -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Liste des Propriétés</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ URL('agence/dashbord') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Accueil
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Propriétés</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.agence.propriete.create') }}" class="btn btn-primary mb-2">Ajouter une Propriété</a>

    <div class="row">
        <div class="col-xl-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h5 class="card-title">Propriétés Listées</h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Adresse</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th>photos</th>
                                <th>id_Agence</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proprietes as $propriete)
                                <tr>
                                    <td>{{ $propriete->id }}</td>
                                    <td>{{ $propriete->type }}</td>
                                    <td>{{ $propriete->adresse }}</td>
                                    <td>{{ $propriete->prix }} €</td>
                                    <td>{{ $propriete->statut }}</td>
                                    <td><img src="{{ asset('uploads/admin/propriete/' . $propriete->photos) }}" alt="Photo" style="width: 100px; height: 100px;"></td>
                                    <td>{{ $propriete->agence ? $propriete->agence->id_agence : '' }}</td>
                                    <td>
                                        <a href="{{ route('admin.agence.propriete.edit', $propriete->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                        <form action="{{ route('admin.agence.propriete.destroy', $propriete->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette propriété ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
