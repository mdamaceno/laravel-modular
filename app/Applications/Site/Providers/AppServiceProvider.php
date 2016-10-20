<?php

namespace App\Applications\Site\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes($this->app['router']);
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'site');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'site');
    }

    public function register()
    {
    }

    protected function registerRoutes(Router $router)
    {
        $router->group([
          'prefix' => '/',
          'namespace' => 'App/Applications/Site/Http/Controllers',
          'middleware' => ['web'],
        ], function ($router) {
            require app_path('Applications/Site/Http/routes.php');
        });
    }
}
