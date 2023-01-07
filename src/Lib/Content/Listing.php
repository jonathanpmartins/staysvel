<?php

namespace Staysvel\Lib\Content;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Listing extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/content/listings', $parameters);
    }

    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/content/listings', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/content/listings/'.$id);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/content/listings/'.$id, $parameters);
    }
}
