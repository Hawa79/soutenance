@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Détails de la Demande #{{ $demande->id }}</h1>

        <div class="mb-4">
            <p class="text-gray-700"><strong class="font-semibold">Sujet:</strong> {{ $demande->subject }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><strong class="font-semibold">Appartement concerné:</strong>
                @if ($demande->apartment)
                    <a href="{{ route('apartment.show', $demande->apartment->id) }}" class="text-blue-600 hover:underline">
                        {{ $demande->apartment->address }}, {{ $demande->apartment->city }}
                    </a>
                @else
                    N/A (Demande générale)
                @endif
            </p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><strong class="font-semibold">Statut:</strong>
                <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                    <span aria-hidden="true" class="absolute inset-0 opacity-50 rounded-full
                        @if($demande->status == 'pending') bg-yellow-200
                        @elseif($demande->status == 'in_progress') bg-blue-200
                        @elseif($demande->status == 'resolved') bg-green-200
                        @else bg-gray-200 @endif"></span>
                    <span class="relative text-xs
                        @if($demande->status == 'pending') text-yellow-900
                        @elseif($demande->status == 'in_progress') text-blue-900
                        @elseif($demande->status == 'resolved') text-green-900
                        @else text-gray-900 @endif">
                        {{ ucfirst($demande->status) }}
                    </span>
                </span>
            </p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><strong class="font-semibold">Date d'envoi:</strong> {{ $demande->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="mb-6">
            <p class="text-gray-700"><strong class="font-semibold">Message:</strong></p>
            <p class="bg-gray-50 p-4 rounded-lg border border-gray-200 mt-2">{{ $demande->message }}</p>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('demande.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
                Retour à mes demandes
            </a>
        </div>
    </div>
</div>
@endsection
