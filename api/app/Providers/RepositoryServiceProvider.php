<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    HelpedPersonRepositoryInterface,
};
use App\Repositories\{
    HelpedPersonRepository,
};
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
            HelpedPersonRepositoryInterface::class,
            HelpedPersonRepository::class
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
