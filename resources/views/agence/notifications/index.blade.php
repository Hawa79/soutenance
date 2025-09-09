@extends('layouts.agence')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- En-tête -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">
            <i class="fas fa-bell text-blue-500 mr-3"></i> Notifications
        </h1>
        <p class="text-gray-600">Toutes vos notifications</p>
    </div>

    @if($notifications->isEmpty())
        <p class="text-center text-gray-500 mt-8 text-lg">Aucune notification pour le moment.</p>
    @else
        <table class="min-w-full border border-gray-200 rounded-xl shadow-md">
            <thead>
                <tr class="bg-blue-100">
                    <th class="py-2 px-4 text-left text-sm font-semibold text-gray-800">Message</th>
                    <th class="py-2 px-4 text-left text-sm font-semibold text-gray-800">Date</th>
                    <th class="py-2 px-4 text-left text-sm font-semibold text-gray-800">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notifications as $index => $notification)
                    @php
                        // Sécurisation : si pas de paiement, valeur par défaut
                        $type = optional($notification->paiement)->type ?? 'location';
                        $createdAt = optional(optional($notification->paiement)->created_at)->format('d/m/Y H:i');

                        $rowColor = $index % 2 === 0 ? 'bg-gray-50' : 'bg-white';

                        // Classes fixes pour Tailwind
                        if($type === 'achat'){
                            $textColor = 'text-green-600';
                            $bgColor = 'bg-green-500';
                        } else {
                            $textColor = 'text-yellow-600';
                            $bgColor = 'bg-yellow-500';
                        }
                    @endphp
                    <tr class="{{ $rowColor }} border-t border-gray-200 hover:bg-gray-100 cursor-pointer"
                        onclick="window.location='{{ route('agence.paiements.index') }}'">
                        <td class="py-2 px-4 text-sm font-medium {{ $textColor }}">
                            {{ $notification->contenu ?? 'Inconnu' }}
                        </td>
                        <td class="py-2 px-4 text-gray-500 text-sm">
                            {{ $createdAt ?? 'Non défini' }}
                        </td>
                        <td class="py-2 px-4">
                            <span class="inline-block px-3 py-1 text-xs font-medium text-white {{ $bgColor }} rounded-full">
                                {{ ucfirst($type) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
