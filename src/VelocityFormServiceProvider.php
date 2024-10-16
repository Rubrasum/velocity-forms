<?php

namespace Rubrasum\VelocityForms;

use Illuminate\Support\ServiceProvider;

class VelocityFormServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/velocityforms.php', 'velocityforms'
        );
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'velocityforms');

        if ($this->app->runningInConsole()) {
            $this->publishes([
//                __DIR__ . '/../config/velocityforms.php' => config_path('velocityforms.php'),
//                __DIR__ . '/../resources/views' => resource_path('views/vendor/velocityforms'),
//                __DIR__ . '/../dist' => public_path('vendor/velocity-forms'),
//                __DIR__ . '/../database/migrations/' => database_path('migrations'),
            ], 'velocityforms');
        }
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