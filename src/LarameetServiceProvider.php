<?php

namespace Susheelbhai\Larameet;
use Illuminate\Support\ServiceProvider;

class LarameetServiceProvider extends ServiceProvider{
       /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'larameet');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->mergeConfigFrom(__DIR__.'/../config/larameet.php','larameet');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPublishable();
    }

    public function registerPublishable()
    {
        $this->publishes([
            __dir__ . "/../config/larameet.php" => config_path('/larameet.php'),
            __dir__ . "/../assets/js" => public_path('storage/js')
        ], 'larameet');
    }
}