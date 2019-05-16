<?php


namespace GetCode\SW\Repositories\Eloquent;


use GetCode\SW\Models\People;
use Illuminate\Support\ServiceProvider;

class EloquentRepositoryServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(PeopleRepository::class, function () {
            return new PeopleRepository(new People());
        });
        $this->app->alias(PeopleRepository::class, 'getcode.sw.repository.eloquent.depositplans');
    }
}