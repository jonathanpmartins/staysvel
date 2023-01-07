<?php

namespace Staysvel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class StaysServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Http::macro('stays', function ()
        {
            $token = base64_encode(config('services.stays.client_id').':'.config('services.stays.client_secret'));
            $endpoint = config('services.stays.endpoint').'/external/v1';

            return Http::withToken($token, 'Basic')
                ->contentType('application/json')
                ->acceptJson()
                ->baseUrl($endpoint);
        });

        Http::macro('staysXlsx', function ()
        {
            $token = base64_encode(config('services.stays.client_id').':'.config('services.stays.client_secret'));
            $endpoint = config('services.stays.endpoint').'/external/v1';

            return Http::withToken($token, 'Basic')
                ->contentType('application/vnd.openxmlformats')
                ->accept('application/vnd.openxmlformats')
                ->baseUrl($endpoint);
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
