<?php

namespace Staysvel\Lib\Content;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Room extends Api
{
    public function list(string $listingId): Response
    {
        return $this->http()->get('/content/listing-rooms/'.$listingId);
    }

    public function create(string $listingId, array $parameters = []): Response
    {
        return $this->http()->post('/content/listing-rooms/'.$listingId, $parameters);
    }

    public function get(string $listingId, string $roomId): Response
    {
        return $this->http()->get('/content/listing-rooms/'.$listingId.'/'.$roomId);
    }

    public function update(string $listingId, string $roomId, array $parameters = []): Response
    {
        return $this->http()->patch('/content/listing-rooms/'.$listingId.'/'.$roomId, $parameters);
    }

    public function delete(string $listingId, string $roomId): Response
    {
        return $this->http()->delete('/content/listing-rooms/'.$listingId.'/'.$roomId);
    }
}
