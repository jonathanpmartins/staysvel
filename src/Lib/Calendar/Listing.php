<?php

namespace Stays\Api\Lib\Calendar;

use Stays\Api\Api;

class Listing extends Api
{
    public function get(string $id): array
    {
        return $this->http()->get('/calendar/listing/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/calendar/listing/'.$id.'/batch', $parameters);
    }
}
