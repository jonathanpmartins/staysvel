<?php

namespace Staysvel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class StaysServiceProvider extends ServiceProvider
{
    public static string $prefix = '/external/v1';

    public function boot(): void
    {
        Http::macro('stays', function ()
        {
            $token = base64_encode(config('services.stays.client_id').':'.config('services.stays.client_secret'));
            $endpoint = config('services.stays.endpoint').StaysServiceProvider::$prefix;

            return Http::withToken($token, 'Basic')
                ->contentType('application/json')
                ->acceptJson()
                ->baseUrl($endpoint);
        });

        Http::macro('staysXlsx', function ()
        {
            $token = base64_encode(config('services.stays.client_id').':'.config('services.stays.client_secret'));
            $endpoint = config('services.stays.endpoint').StaysServiceProvider::$prefix;

            return Http::withToken($token, 'Basic')
                ->contentType('application/vnd.openxmlformats')
                ->accept('application/vnd.openxmlformats')
                ->baseUrl($endpoint);
        });
    }

    public function register(): void
    {
        $this->app->singleton(Stays::class, function()
        {
            return new Stays();
        });
    }
}
