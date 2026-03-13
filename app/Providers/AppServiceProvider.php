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
        // Gunakan request-based check agar lebih fleksibel
        $isLocal = str_contains(request()->getHost(), 'localhost') || str_contains(request()->getHost(), '127.0.0.1');

        if (!$isLocal) {
            if (config('app.url')) {
                \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
            }
            
            // Selalu force HTTPS di environment produksi/hosting
            if (app()->environment('production') || !empty(request()->server('HTTP_X_FORWARDED_PROTO'))) {
                \Illuminate\Support\Facades\URL::forceScheme('https');
            }
        }
    }
}
