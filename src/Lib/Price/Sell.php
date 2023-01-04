<?php

namespace Stays\Lib\Price;

use Stays\Api;

class Sell extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/parr/listing-rates-sell', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/parr/listing-rates-sell/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/parr/listing-rates-sell/'.$id, $parameters);
    }
}
