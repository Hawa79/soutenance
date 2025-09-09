<?php
namespace App\Http\Controllers\Agence; // Garde le namespace Agence si tu veux tout dans le même controller

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /* ------------------ AGENCE ------------------ */

    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->get();
        return view('agence.notifications.index', compact('notifications'));
    }

    public function show($id)
    {
        $notification = Notification::findOrFail($id);

        // Vérifie que la notif appartient à l'agence connectée
        if ($notification->notifiable_id != Auth::id()) {
            abort(403);
        }

        $notification->update(['lu' => true]);

        return redirect()->route('agence.notifications.index');
    }

    public function marquerToutCommeLu()
    {
        Auth::user()->notifications()->where('lu', false)->update(['lu' => true]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $notification = Notification::where('id', $id)
            ->where('notifiable_id', Auth::id())
            ->first();

        if (!$notification) {
            return redirect()->back()->with('error', 'Notification non trouvée.');
        }

        $notification->delete();

        return redirect()->back()->with('success', 'Notification supprimée.');
    }

    /* ------------------ ADMIN ------------------ */

    public function adminIndex()
    {
        $notifications = Auth::user()->notifications()->latest()->get();
        return view('admin.notification.index', compact('notifications'));
    }

    public function adminShow($id)
    {
        $notification = Notification::findOrFail($id);

        // Vérifie que la notif appartient à l'admin connecté
        if ($notification->notifiable_id != Auth::id()) {
            abort(403);
        }

        $notification->update(['lu' => true]);

        return redirect()->route('admin.notifications.index');
    }

    public function adminMarquerToutCommeLu()
    {
        Auth::user()->notifications()->where('lu', false)->update(['lu' => true]);
        return redirect()->back();
    }

    public function adminDestroy($id)
    {
        $notification = Notification::where('id', $id)
            ->where('notifiable_id', Auth::id())
            ->first();

        if (!$notification) {
            return redirect()->back()->with('error', 'Notification non trouvée.');
        }

        $notification->delete();

        return redirect()->back()->with('success', 'Notification supprimée.');
    }
}
