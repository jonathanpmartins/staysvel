<?php

namespace Stays\Api;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Stays\Api\Booking\Booking;

class Stays
{
    public static function booking(): Booking
    {
        return new Booking();
    }

    protected function get(string $uri): object
    {
        $token = base64_encode(config('stays.client_id').':'.config('stays.client_secret'));

        $endpoint = config('stays.endpoint');

        $response = Http::withToken($token, 'Basic')
            ->contentType('application/json')
            ->acceptJson()
            ->get($endpoint.'/external/v1'.$uri);

        return $this->response($response);
    }

    protected function response(Response $response): object
    {
        if ($response->successful())
        {
            return $response->object();
        }

        return $this->responseFailed($response);
    }

    protected function responseFailed(Response $response): object
    {
        return (object) [
            'failed' => $response->failed(),
            'status' => $response->status(),
            'body' => $response->body(),
            'json' => $response->json(),
        ];
    }
}
