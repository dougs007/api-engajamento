<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    ActivityRepositoryInterface,
    HelpedPersonRepositoryInterface,
    LeaderRepositoryInterface,
    PersonActivityRepositoryInterface
};

use App\Repositories\{
    ActivityRepository,
    HelpedPersonRepository,
    LeaderRepository,
    PersonActivityRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * OBS: For each, duplicate a line and declare the classes!
         */

        $this->app->bind(
            HelpedPersonRepositoryInterface::class,
            HelpedPersonRepository::class
        );

        $this->app->bind(
            ActivityRepositoryInterface::class,
            ActivityRepository::class
        );

        $this->app->bind(
            LeaderRepositoryInterface::class,
            LeaderRepository::class
        );

        $this->app->bind(
        PersonActivityRepositoryInterface::class,
        PersonActivityRepository::class
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
