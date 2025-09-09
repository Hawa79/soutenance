<?php

namespace App\Providers;
use App\Models\Notification;

use App\Models\Message;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
        $notificationsNonLues = Notification::where('lu', false)->latest()->take(5)->get();
        $nbNotificationsNonLues = Notification::where('lu', false)->count();

        $view->with([
            'notificationsNonLues' => $notificationsNonLues,
            'nbNotificationsNonLues' => $nbNotificationsNonLues,
        ]);
    });
    }
}
