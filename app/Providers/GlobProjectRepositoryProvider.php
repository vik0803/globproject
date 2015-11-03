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
        // User
        $this->app->bind(
            \GlobProject\Repositories\UserRepository::class,
            \GlobProject\Repositories\UserRepositoryEloquent::class
        );

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

        // Project Tasks
        $this->app->bind(
            \GlobProject\Repositories\ProjectTasksRepository::class,
            \GlobProject\Repositories\ProjectTasksRepositoryEloquent::class
        );
    }
}
