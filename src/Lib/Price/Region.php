<?php

namespace Staysvel\Lib\Price;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Region extends Api
{
    public function search(): Response
    {
        return $this->http()->get('/parr/price-regions');
    }

    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/parr/price-regions', $parameters);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/parr/price-regions/'.$id, $parameters);
    }

    public function delete(string $id): Response
    {
        return $this->http()->delete('/parr/price-regions/'.$id);
    }
}
