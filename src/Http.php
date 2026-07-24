<?php

namespace Staysvel;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http AS HttpClient;

class Http
{
    private bool $isXlsx = false;
    private int $timeout = 30;
    private int $connectTimeout = 10;

    public function timeout(int $timeout): static
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function connectTimeout(int $connectTimeout): static
    {
        $this->connectTimeout = $connectTimeout;

        return $this;
    }

    public function isXlsx(): static
    {
        $this->isXlsx = true;

        return $this;
    }

    /**
     * @throws ConnectionException
     */
    public function get(string $uri, array $parameters = []): Response
    {
        if ($this->isXlsx)
        {
            $client = HttpClient::staysXlsx()
                ->timeout($this->timeout)
                ->connectTimeout($this->connectTimeout);
        }
        else
        {
            $client = HttpClient::stays()
                ->timeout($this->timeout)
                ->connectTimeout($this->connectTimeout);
        }

        return $client->get($uri, $parameters);
    }

    /**
     * @throws ConnectionException
     */
    public function post(string $uri, array $parameters = []): Response
    {
        return HttpClient::stays()
            ->timeout($this->timeout)
            ->connectTimeout($this->connectTimeout)
            ->post($uri, $parameters);
    }

    /**
     * @throws ConnectionException
     */
    public function patch(string $uri, array $parameters = []): Response
    {
        return HttpClient::stays()
            ->timeout($this->timeout)
            ->connectTimeout($this->connectTimeout)
            ->patch($uri, $parameters);
    }

    /**
     * @throws ConnectionException
     */
    public function delete(string $uri): Response
    {
        return HttpClient::stays()
            ->timeout($this->timeout)
            ->connectTimeout($this->connectTimeout)
            ->delete($uri);
    }
}
