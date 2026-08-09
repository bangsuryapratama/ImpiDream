<?php

namespace App\Providers;

use App\Repositories\Contracts\DreamRepositoryInterface;
use App\Repositories\Eloquent\DreamRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DreamRepositoryInterface::class, DreamRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
