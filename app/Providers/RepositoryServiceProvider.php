<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
            'App\Repositories\RepositoryInterfaces\CustomerRepositoryInterface','App\Repositories\CustomerRepository',
            'App\Repositories\RepositoryInterfaces\CustomerBasicDataReporitaryInterface','App\Repositories\CustomerBasicDataReporitary',
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
