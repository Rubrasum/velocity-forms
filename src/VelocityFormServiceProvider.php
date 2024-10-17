<?php

namespace Rubrasum\VelocityForms;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;


class VelocityFormServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Merge package config into application config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/velocityforms.php',
            'velocityforms'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'velocity-forms');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/velocity-forms.php' => App::configPath('velocity-forms.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => App::resourcePath('views/vendor/velocity-forms'),
            ], 'views');
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
