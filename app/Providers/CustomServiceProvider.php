<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Services\YourService;






class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(YourService::class, function ($app) {
            return new YourService();
        });
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
