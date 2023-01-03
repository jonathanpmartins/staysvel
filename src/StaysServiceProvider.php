<?php

namespace Stays\Api;

use Illuminate\Support\ServiceProvider;

class StaysServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/stays.php' => config_path('stays.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(Stays::class, function()
        {
            return new Stays();
        });
    }
}
