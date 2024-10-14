<?php

namespace Rubrasum\VelocityForms;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class VelocityFormServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register bindings, if any
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Load the package's migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load the package's routes, if applicable
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
