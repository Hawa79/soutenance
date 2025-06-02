@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Modifier la Location</h2>

    <form action="{{ route('locations.update', $location) }}" method="POST">
        @csrf
        @method('PUT')
        @include('locations.form')
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
