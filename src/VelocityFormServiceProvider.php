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

        // Load the package's views, if applicable
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'velocityforms');

        // In your boot method:
        $this->publishes([
            __DIR__ . '/../config/velocityforms.php' => Config::get('app.config_path') . '/velocityforms.php',
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/velocityforms'),
        ], 'assets');

        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }
}
