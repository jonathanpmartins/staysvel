<?php

namespace Staysvel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class StaysServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/stays.php' => config_path('stays.php'),
        ]);

        $token = base64_encode(config('stays.client_id').':'.config('stays.client_secret'));

        Http::macro('stays', function () use ($token)
        {
            return Http::withToken($token, 'Basic')
                ->contentType('application/json')
                ->acceptJson()
                ->baseUrl(config('stays.endpoint').'/external/v1');
        });

        Http::macro('staysXlsx', function () use ($token)
        {
            return Http::withToken($token, 'Basic')
                ->contentType('application/vnd.openxmlformats')
                ->accept('application/vnd.openxmlformats')
                ->baseUrl(config('stays.endpoint').'/external/v1');
        });
    }

    public function register()
    {
        $this->app->singleton(Stays::class, function()
        {
            return new Stays();
        });
    }
}
