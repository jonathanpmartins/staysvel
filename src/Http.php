<?php

namespace Staysvel;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http AS HttpClient;

class Http
{
    private bool $isXlsx = false;
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
            $client = HttpClient::staysXlsx()
                ->timeout($this->timeout)
                ->connectTimeout($this->timeout);
        }
        else
        {
            $client = HttpClient::stays()
                ->timeout($this->timeout)
                ->connectTimeout($this->timeout);
        }

        return $client->get($uri, $parameters);
    }

    public function post(string $uri, array $parameters = []): Response
    {
        return HttpClient::stays()
            ->timeout($this->timeout)
            ->connectTimeout($this->timeout)
            ->post($uri, $parameters);
    }

    public function patch(string $uri, array $parameters = []): Response
    {
        return HttpClient::stays()
            ->timeout($this->timeout)
            ->connectTimeout($this->timeout)
            ->patch($uri, $parameters);
    }

    public function delete(string $uri): Response
    {
        return HttpClient::stays()
            ->timeout($this->timeout)
            ->connectTimeout($this->timeout)
            ->delete($uri);
    }
}
