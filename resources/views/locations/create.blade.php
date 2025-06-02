@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Ajouter une Location</h2>

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        @include('locations.form')
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
