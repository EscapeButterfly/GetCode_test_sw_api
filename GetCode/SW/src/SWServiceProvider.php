<?php

namespace GetCode\SW;

use GetCode\SW\Repositories\PeopleRepository;
use GetCode\SW\SWAPI\SWapiClient;
use GetCode\SW\SWAPI\SWapiService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class SWServiceProvider extends ServiceProvider {
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot() {
        $this->loadRoutesFrom(__DIR__ . '/routes/swapi.php');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->app->make(EloquentFactory::class)->load(__DIR__ . '/database/factories/');
    }

    public function register() {
        $this->app->bind(SWapiService::class, function ($app) {
            return new SWapiService(new SWapiClient(), new PeopleRepository($app));
        });

        $this->app->alias(SWapiService::class, 'getcode.sw.apiservice');
    }
}