<?php

namespace Stays\Lib\Price;

use Stays\Api;

class Rule extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/parr/seasons-sell', $parameters);
    }

    public function create(array $parameters = []): array
    {
        return $this->http()->post('/parr/seasons-sell', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/parr/seasons-sell/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/parr/seasons-sell/'.$id, $parameters);
    }

    public function delete(string $id): array
    {
        return $this->http()->delete('/parr/seasons-sell/'.$id);
    }
}
