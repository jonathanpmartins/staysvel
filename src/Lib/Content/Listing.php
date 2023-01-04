<?php

namespace Stays\Lib\Content;

use Stays\Api;

class Listing extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/content/listings', $parameters);
    }

    public function create(array $parameters = []): array
    {
        return $this->http()->post('/content/listings', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/content/listings/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/content/listings/'.$id, $parameters);
    }
}
