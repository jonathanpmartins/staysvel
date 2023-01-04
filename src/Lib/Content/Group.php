<?php

namespace Staysvel\Lib\Content;

use Staysvel\Api;

class Group extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/content/groups', $parameters);
    }

    public function create(array $parameters = []): array
    {
        return $this->http()->post('/content/groups', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/content/groups/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/content/groups/'.$id, $parameters);
    }

    public function delete(string $id): array
    {
        return $this->http()->delete('/content/groups/'.$id);
    }
}
