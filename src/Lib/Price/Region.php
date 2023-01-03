<?php

namespace Stays\Api\Lib\Price;

use Stays\Api\Api;

class Region extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/parr/price-regions', $parameters);
    }

    public function create(array $parameters = []): array
    {
        return $this->http()->post('/parr/price-regions', $parameters);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/parr/price-regions/'.$id, $parameters);
    }

    public function delete(string $id): array
    {
        return $this->http()->delete('/parr/price-regions/'.$id);
    }
}
