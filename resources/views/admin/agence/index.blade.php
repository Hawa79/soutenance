*@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-2">
            <!-- begin page title -->
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Listes des agences</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/admin/dashbord') }}"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Acceuil
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">Agences</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <a href="{{ url('admin/agence/create') }}" class="btn btn-primary mb-2 mt-2">Ajouter un agence</a>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="datatable-wrapper table-responsive">
                                <table id="datatable" class="table table-striped table-bordered table-border-3 mb-2">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agences as $agence)
                                            <tr>
                                                <td>{{ $agence->nom }}</td>
                                                <td>{{ $agence->prenom }}</td>
                                                <td>{{ $agence->email }}</td>
                                                <td>
                                                    <a href="{{ URL('admin/agence/edit/' . $agence->id) }}">
                                                        <button type="button" class="btn btn-secondary">Modifier</button>
                                                    </a>
                                                    <a href="{{ url('/admin/agence/delete/' . $agence->id) }}">
                                                        <button type="button" class="btn btn-danger">Supprimer</button>
                                                    </a>
                                                </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
