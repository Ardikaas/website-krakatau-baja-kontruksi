<?php

namespace App\Providers;

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

    public function boot(): void
    {
        // Hanya force URL dan HTTPS jika bukan di localhost
        if (!app()->runningInConsole() && !request()->is('localhost*') && !str_contains(request()->getHost(), '127.0.0.1')) {
            if (config('app.url')) {
                \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
            }
            
            if (app()->environment('production')) {
                \Illuminate\Support\Facades\URL::forceScheme('https');
            }
        }
    }
}
