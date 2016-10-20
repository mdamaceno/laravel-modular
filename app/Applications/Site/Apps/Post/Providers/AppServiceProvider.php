<?php

namespace App\Applications\Site\Apps\Post\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes($this->app['router']);
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'posts');
    }

    public function register()
    {
        $this->app->bind(
          'App\Domains\Posts\Repositories\RepositoryInterface',
          'App\Domains\Posts\Repositories\PostRepositoryEloquent'
        );
    }

    protected function registerRoutes(Router $router)
    {
        $router->group([
          'prefix' => '/',
          'namespace' => 'App\Applications\Site\Apps\Post\Http\Controllers',
          'middleware' => ['web'],
        ], function ($router) {
            require app_path('Applications/Site/Apps/Post/Http/routes.php');
        });
    }
}
