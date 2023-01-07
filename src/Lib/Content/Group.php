<?php

namespace Staysvel\Lib\Content;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Group extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/content/groups', $parameters);
    }

    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/content/groups', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/content/groups/'.$id);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/content/groups/'.$id, $parameters);
    }

    public function delete(string $id): Response
    {
        return $this->http()->delete('/content/groups/'.$id);
    }
}
