<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PersonRepositoryInterface;
use App\Repositories\PersonRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
