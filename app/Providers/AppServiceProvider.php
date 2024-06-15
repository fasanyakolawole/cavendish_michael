<?php

namespace App\Providers;

use App\Repositories\EloquentWebsiteRepository;
use App\Repositories\Interfaces\WebsiteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WebsiteRepositoryInterface::class, EloquentWebsiteRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }
}
