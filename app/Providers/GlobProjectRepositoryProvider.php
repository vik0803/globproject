<?php

namespace GlobProject\Providers;

use Illuminate\Support\ServiceProvider;

class GlobProjectRepositoryProvider extends ServiceProvider
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
        $this->app->bind(
            \GlobProject\Repositories\ClientRepository::class,
            \GlobProject\Repositories\ClientRepositoryEloquent::class
        );
    }
}
