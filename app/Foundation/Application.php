<?php

namespace App\Foundation;

use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication
{
    public function bootstrapPath($path = '')
    {
        // En Vercel el filesystem es de solo lectura — redirige bootstrap/cache a /tmp
        if (getenv('VERCEL') && str_starts_with((string) $path, 'cache')) {
            $tmpCache = '/tmp/bootstrap/cache';
            if (!is_dir($tmpCache)) {
                mkdir($tmpCache, 0755, true);
            }
            return '/tmp/bootstrap/' . $path;
        }

        return parent::bootstrapPath($path);
    }
}
