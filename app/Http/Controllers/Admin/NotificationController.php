<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Crée une notification.
     */
    public static function createNotification(string $titre, string $contenu, string $type, $notifiableId = null, $notifiableType = null)
    {
        $user = Auth::user();

        return Notification::create([
            'titre' => $titre,
            'contenu' => $contenu,
            'type' => $type,
            'notifiable_id' => $notifiableId ?? $user->id,
            'notifiable_type' => $notifiableType ?? get_class($user),
            'lu' => false,
        ]);
    }

    /**
     * Liste toutes les notifications pour l'utilisateur connecté.
     */
    public function index()
    {
        $notifications = $this->getUserNotifications();
        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Liste toutes les notifications du système pour l'admin.
     */
    public function allSystemNotifications()
    {
        // Ici, on récupère toutes les notifications qui ne sont pas spécifiques à un autre type
        $notifications = Notification::latest()->get();
        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Marquer une notification comme lue.
     */
    public function marquerCommeLue(int $id)
    {
        $notif = Notification::findOrFail($id);
        $this->authorizeNotification($notif);
        $notif->update(['lu' => true]);

        return back()->with('success', 'Notification marquée comme lue.');
    }

    /**
     * Marquer toutes les notifications comme lues.
     */
    public function toutLire()
    {
        $user = Auth::user();

        Notification::where('notifiable_id', $user->id)
            ->where('notifiable_type', get_class($user))
            ->where('lu', false)
            ->update(['lu' => true]);

        return back()->with('success', 'Toutes les notifications sont maintenant lues.');
    }

    /**
     * Récupérer toutes les notifications d’un utilisateur.
     */
    private function getUserNotifications()
    {
        $user = Auth::user();

        return Notification::where('notifiable_id', $user->id)
            ->where('notifiable_type', get_class($user))
            ->latest()
            ->get();
    }

    /**
     * Vérifie si l'utilisateur peut accéder à la notification.
     */
    private function authorizeNotification(Notification $notif)
    {
        $user = Auth::user();
        if ($notif->notifiable_id !== $user->id && !is_a($user, 'App\Models\Admin')) {
            abort(403, 'Accès non autorisé à cette notification.');
        }
    }
}
