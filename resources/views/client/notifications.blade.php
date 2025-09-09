
<div class="container py-4">
    <a href="{{ route('client.compte') }}" class="back-link">
        <i class="bi bi-arrow-left"></i> Retour
    </a>

    <h2 class="mb-4 text-center">Mes Notifications</h2>

    @isset($notifications)
        @forelse($notifications as $notification)
            <div class="card shadow-sm mb-3 border {{ $notification->lu ? 'border-secondary' : 'border-primary bg-light' }}">
                <div class="card-body">
                    <h5 class="card-title text-primary fw-bold">{{ $notification->titre }}</h5>
                    <p class="card-text">{{ $notification->contenu }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Reçue le {{ $notification->created_at->format('d/m/Y à H:i') }}</small>
                        @unless($notification->lu)
                            <span class="badge bg-primary">Nouveau</span>
                        @endunless
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                Aucune notification pour le moment.
            </div>
        @endforelse
    @else
        <div class="alert alert-danger text-center">
            Les notifications n'ont pas pu être chargées.
        </div>
    @endisset
</div>

