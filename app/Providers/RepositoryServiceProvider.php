<?php

namespace ApiContas\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\ApiContas\Repositories\BillsRepository::class, \ApiContas\Repositories\BillsRepositoryEloquent::class);
        $this->app->bind(\ApiContas\Repositories\UserRepository::class, \ApiContas\Repositories\UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
