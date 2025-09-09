@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Envoyer une Demande</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                <strong class="font-bold">Succès!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('demande.store') }}" method="POST">
            @csrf

            @if (isset($propriete) && $propriete)
                <div class="mb-4">
                    <label for="apartment_info" class="block text-gray-700 text-sm font-bold mb-2">Proprieté concernée:</label>
                    <input type="text" id="apartment_info" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-100 cursor-not-allowed" value="{{ $propriete->address }}, {{ $propriete->city }}" readonly>
                    <input type="hidden" name="apartment_id" value="{{ $propriete->id }}">
                </div>
            @endif

            <div class="mb-4">
                <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Sujet:</label>
                <input type="text" name="subject" id="subject" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('subject') border-red-500 @enderror" value="{{ old('subject') }}" required>
                @error('subject')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
                <textarea name="message" id="message" rows="5" class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
                    Envoyer la demande
                </button>
                <a href="{{ url()->previous() }}" class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
