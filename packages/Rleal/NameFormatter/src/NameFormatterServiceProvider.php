<?php

namespace Rleal\NameFormatter;

use Illuminate\Support\ServiceProvider;

class NameFormatterServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'rleal');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'rleal');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/nameformatter.php', 'nameformatter');

        // Register the service the package provides.
        $this->app->singleton('nameformatter', function ($app) {
            return new NameFormatter;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['nameformatter'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/nameformatter.php' => config_path('nameformatter.php'),
        ], 'nameformatter.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/rleal'),
        ], 'nameformatter.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/rleal'),
        ], 'nameformatter.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/rleal'),
        ], 'nameformatter.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
