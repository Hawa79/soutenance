@extends('layouts.agence') {{-- adapte selon ton layout --}}

@section('content')
    <div class="container">
        <h3>Demande de {{ $demande->client->name ?? 'Client inconnu' }}</h3>
        <p><strong>Message :</strong> {{ $demande->message }}</p>

        <hr>

        {{-- Formulaire de réponse --}}
        @if(Auth::id() === $demande->agence_id)
        <h4>Répondre à cette demande</h4>
        <form action="{{ route('agence.demandes.repondre', $demande->id) }}" method="POST">
            @csrf
            <textarea name="message" rows="4" class="form-control" placeholder="Votre réponse..."></textarea>
            <button class="btn btn-primary mt-2" type="submit">Envoyer</button>
        </form>
        @endif

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <hr>

        <h4>Réponses envoyées</h4>
        @forelse($demande->reponses as $reponse)
            <div class="border p-2 rounded mb-2">
                <strong>Agence :</strong> {{ $reponse->message }}<br>
                <small>{{ $reponse->created_at->format('d/m/Y H:i') }}</small>
            </div>
        @empty
            <p>Aucune réponse envoyée.</p>
        @endforelse
    </div>
@endsection
