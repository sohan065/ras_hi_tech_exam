<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FileSystemRepositoryServices;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // file system service
        $this->app->singleton('FileSystemRepositoryServices', function ($app) {
            return new FileSystemRepositoryServices;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
