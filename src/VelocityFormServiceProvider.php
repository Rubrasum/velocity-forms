<?php

namespace Rubrasum\VelocityForms;

use Illuminate\Support\ServiceProvider;

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

        // Publish configuration, if you have a config file
        $this->publishes([
            __DIR__ . '/../config/velocityforms.php' => config_path('velocityforms.php'),
        ], 'config');

        // Publish assets, such as CSS or JS files
        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/velocityforms'),
        ], 'assets');

        // Publish migrations if users need to copy them to their own migrations folder
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }
}
