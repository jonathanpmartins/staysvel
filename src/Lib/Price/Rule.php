<?php

namespace Staysvel\Lib\Price;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Rule extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/parr/seasons-sell', $parameters);
    }

    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/parr/seasons-sell', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/parr/seasons-sell/'.$id);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/parr/seasons-sell/'.$id, $parameters);
    }

    public function delete(string $id): Response
    {
        return $this->http()->delete('/parr/seasons-sell/'.$id);
    }
}
