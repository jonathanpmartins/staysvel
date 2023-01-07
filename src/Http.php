<?php

namespace Staysvel;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http AS HttpClient;

class Http
{
    private bool $isXlsx;

    public function __construct(bool $isXlsx = false)
    {
        $this->isXlsx = $isXlsx;
    }

    public function get(string $uri, array $parameters = []): Response
    {
        $client = $this->isXlsx ? HttpClient::staysXlsx() : HttpClient::stays();

        return $client->get($uri, $parameters);
    }

    public function post(string $uri, array $parameters = []): Response
    {
        return HttpClient::stays()->post($uri, $parameters);
    }

    public function patch(string $uri, array $parameters = []): Response
    {
        return HttpClient::stays()->patch($uri, $parameters);
    }

    public function delete(string $uri): Response
    {
        return HttpClient::stays()->delete($uri);
    }
}
