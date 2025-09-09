@extends('layouts.agence')
@section('content')
<div class="container mt-4">
    <h3>Notifications</h3>
    <ul class="list-group">
        @forelse($notifications as $notif)
            <li class="list-group-item">
                {{ $notif->message }}<br>
                <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
            </li>
        @empty
            <li class="list-group-item">Aucune notification.</li>
        @endforelse
    </ul>
</div>
@endsection
