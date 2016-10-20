<?php

namespace App\Applications\Rest\V1\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes($this->app['router']);
    }

    public function register()
    {
    }

    protected function registerRoutes(Router $router)
    {
        $router->group([
          'prefix' => '/',
          'namespace' => 'App\Applications\Rest\V1\Http\Controllers',
        ], function ($router) {
            require app_path('Applications/Rest/V1/Http/routes.php');
        });
    }
}
