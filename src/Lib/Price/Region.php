<?php

namespace Stays\Lib\Price;

use Stays\Api;

class Region extends Api
{
    public function search(): array
    {
        return $this->http()->get('/parr/price-regions');
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
