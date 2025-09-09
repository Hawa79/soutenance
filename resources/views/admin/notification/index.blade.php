@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>🔔 Notifications ({{ $nbNotificationsNonLues }} non lues)</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Reçue le</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notifications as $notif)
                <tr class="{{ $notif->lu ? '' : 'table-warning' }}">
                    <td>{{ $notif->titre }}</td>
                    <td>{{ $notif->contenu }}</td>
                    <td>{{ $notif->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($notif->lu)
                            <span class="badge bg-secondary">Lue</span>
                        @else
                            <span class="badge bg-warning text-dark">Non lue</span>
                        @endif
                    </td>
                    <td>
                        @if(!$notif->lu)
                            <a href="{{ route('admin.notifications.lue', $notif->id) }}" class="btn btn-sm btn-success">
                                ✅ Marquer comme lue
                            </a>
                        @else
                            <span class="text-muted">Aucune action</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune notification.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
