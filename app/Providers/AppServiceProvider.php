<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Worklist\WorklistService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(WorklistService::class, function ($app) {
            return new WorklistService();
        });
    }
}
