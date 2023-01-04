<?php

namespace Staysvel\Lib\Content;

use Staysvel\Api;

class Property extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/content/properties', $parameters);
    }

    public function create(array $parameters = []): array
    {
        return $this->http()->post('/content/properties', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/content/properties/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/content/properties/'.$id, $parameters);
    }
}
