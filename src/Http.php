<?php

namespace Stays;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http AS HttpClient;

class Http
{
    private bool $isXlsx;

    public function __construct(bool $isXlsx = false)
    {
        $this->isXlsx = $isXlsx;
    }

    public function get(string $uri, array $parameters = []): array|string
    {
        $response = ($this->isXlsx ? HttpClient::staysXlsx() : HttpClient::stays())->get($uri, $parameters);

        return $this->response($response);
    }

    public function post(string $uri, array $parameters = []): array
    {
        $response = HttpClient::stays()->post($uri, $parameters);

        return $this->response($response);
    }

    public function patch(string $uri, array $parameters = []): array
    {
        $response = HttpClient::stays()->patch($uri, $parameters);

        return $this->response($response);
    }

    public function delete(string $uri): array
    {
        $response = HttpClient::stays()->delete($uri);

        return $this->response($response);
    }

    private function response(Response $response): array|string
    {
        if ($response->failed())
        {
            return [
                'failed' => $response->failed(),
                'status' => $response->status(),
                'body' => $response->body(),
                'json' => $response->json(),
            ];
        }

        return $this->isXlsx ? $response->body() : $response->json();
    }
}
