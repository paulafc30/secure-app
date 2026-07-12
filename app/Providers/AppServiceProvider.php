<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        // Vercel serverless: filesystem de solo lectura excepto /tmp
        if (getenv('VERCEL')) {
            URL::forceScheme('https');
            $dirs = [
                '/tmp/storage/framework/views',
                '/tmp/storage/framework/cache/data',
                '/tmp/storage/logs',
                '/tmp/storage/app/public',
            ];
            foreach ($dirs as $dir) {
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }
            }
            app()->useStoragePath('/tmp/storage');
        }
    }
}
