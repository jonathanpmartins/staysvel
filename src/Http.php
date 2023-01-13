<?php

namespace Staysvel;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http AS HttpClient;

class Http
{
    private bool $isXlsx;
    private int $timeout = 60;

    public function timeout(int $timeout): static
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function isXlsx(): static
    {
        $this->isXlsx = true;

        return $this;
    }

    public function get(string $uri, array $parameters = []): Response
    {
        if ($this->isXlsx)
        {
            $client = HttpClient::timeout($this->timeout)->staysXlsx();
        }
        else
        {
            $client = HttpClient::timeout($this->timeout)->stays();
        }

        return $client->get($uri, $parameters);
    }

    public function post(string $uri, array $parameters = []): Response
    {
        return HttpClient::timeout($this->timeout)->stays()->post($uri, $parameters);
    }

    public function patch(string $uri, array $parameters = []): Response
    {
        return HttpClient::timeout($this->timeout)->stays()->patch($uri, $parameters);
    }

    public function delete(string $uri): Response
    {
        return HttpClient::timeout($this->timeout)->stays()->delete($uri);
    }
}
