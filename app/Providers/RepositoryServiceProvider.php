<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Interfaces\UserRepositoryInterface::class, 
            \App\Repositories\UserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\EmployeeRepositoryInterface::class, 
            \App\Repositories\EmployeeRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\ClientRepositoryInterface::class, 
            \App\Repositories\ClientRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
