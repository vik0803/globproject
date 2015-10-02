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
        // Client
        $this->app->bind(
            \GlobProject\Repositories\ClientRepository::class,
            \GlobProject\Repositories\ClientRepositoryEloquent::class
        );

        // Project
        $this->app->bind(
            \GlobProject\Repositories\ProjectRepository::class,
            \GlobProject\Repositories\ProjectRepositoryEloquent::class
        );

        // Project Note
        $this->app->bind(
            \GlobProject\Repositories\ProjectNoteRepository::class,
            \GlobProject\Repositories\ProjectNoteRepositoryEloquent::class
        );
    }
}
