<?php

namespace Staysvel\Lib\Content;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Property extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/content/properties', $parameters);
    }

    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/content/properties', $parameters);
    }

    public function get(string $propertyId): Response
    {
        return $this->http()->get('/content/properties/'.$propertyId);
    }

    public function update(string $propertyId, array $parameters = []): Response
    {
        return $this->http()->patch('/content/properties/'.$propertyId, $parameters);
    }
}
