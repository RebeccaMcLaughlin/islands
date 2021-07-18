<?php

namespace App\Providers\Islands;

use Illuminate\Support\ServiceProvider;
use App\Services\Islands\IslandGenerator;

class IslandProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IslandGenerator::class, function ($app) {
            return new IslandGenerator();
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
