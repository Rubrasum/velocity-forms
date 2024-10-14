<?php

namespace Rubrasum\VelocityForms;

use Illuminate\Support\Facades\App;
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
        // Merge the package's config file
        $this->mergeConfigFrom(
            __DIR__.'/../config/velocityforms.php', 'velocityforms'
        );
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


        // Register the package's publishable resources
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/velocityforms.php' => App::configPath('velocityforms.php'),
            ], 'velocityforms-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => App::resourcePath('views/vendor/velocityforms'),
            ], 'velocityforms-views');

            $this->publishes([
                __DIR__ . '/../dist' => App::publicPath('vendor/velocity-forms'),
            ], 'velocityforms-assets');

            $this->publishes([
                __DIR__ . '/../database/migrations/' => App::databasePath('migrations'),
            ], 'velocityforms-migrations');
        }

        // In your boot method:
//        $this->publishes([
//            __DIR__ . '/../config/velocityforms.php' => Config::get('app.config_path') . '/velocityforms.php',
//        ], 'config');
//
//        $this->publishes([
//            __DIR__ . '/../resources/assets' => public_path('vendor/velocityforms'),
//        ], 'assets');
//
//        $this->publishes([
//            __DIR__ . '/../database/migrations' => database_path('migrations'),
//        ], 'migrations');
    }
}
