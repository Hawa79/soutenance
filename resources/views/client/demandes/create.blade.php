@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Faire une demande pour la propriété : {{ $propriete->titre }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('demandes.store') }}">
        @csrf

        <input type="hidden" name="propriete_id" value="{{ $propriete->id }}">

        <div class="form-group">
            <label for="sujet">Sujet</label>
            <input type="text" name="sujet" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer la demande</button>
    </form>
</div>
@endsection
