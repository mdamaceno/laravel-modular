<?php

namespace App\Domains\Posts\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');
    }
}
