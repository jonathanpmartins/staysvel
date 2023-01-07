<?php

namespace Staysvel\Lib\Price;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Sell extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/parr/listing-rates-sell', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/parr/listing-rates-sell/'.$id);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/parr/listing-rates-sell/'.$id, $parameters);
    }
}
