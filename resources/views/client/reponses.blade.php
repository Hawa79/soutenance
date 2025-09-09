@extends('layouts.client')

@section('content')
    <h2>Mes réponses d’agence</h2>

    @foreach ($demandes as $demande)
        <div class="card my-3">
            <div class="card-header">
                <strong>Demande #{{ $demande->id }}</strong> — {{ $demande->objet ?? 'Objet non défini' }}
            </div>
            <div class="card-body">
                @if($demande->reponses->count())
                    @foreach($demande->reponses as $reponse)
                        <div class="border p-2 mb-2">
                            <p><strong>Agence :</strong> {{ $reponse->agence->nom ?? 'Nom non disponible' }}</p>
                            <p>{{ $reponse->message }}</p>
                            <p class="text-muted">Envoyé le {{ $reponse->created_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    @endforeach
                @else
                    <p>Aucune réponse pour cette demande.</p>
                @endif
            </div>
        </div>
    @endforeach
@endsection
