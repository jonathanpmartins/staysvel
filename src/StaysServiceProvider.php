<?php

namespace Staysvel;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class StaysServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $token = base64_encode($this->config('services.stays.client_id').':'.$this->config('services.stays.client_secret'));

        $endpoint = $this->config('services.stays.endpoint').'/external/v1';

        Http::macro('stays', function () use ($token, $endpoint)
        {
            return Http::withToken($token, 'Basic')
                ->contentType('application/json')
                ->acceptJson()
                ->baseUrl($endpoint);
        });

        Http::macro('staysXlsx', function () use ($token, $endpoint)
        {
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

    private function config($key = null)
    {
        return $this->app('config')->get($key);
    }

    private function app($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }

        return Container::getInstance()->make($abstract, $parameters);
    }
}
