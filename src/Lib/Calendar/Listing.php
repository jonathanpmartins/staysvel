<?php

namespace Staysvel\Lib\Calendar;

use Staysvel\Api;

class Listing extends Api
{
    public function get(string $id, array $parameters = []): array
    {
        return $this->http()->get('/calendar/listing/'.$id, $parameters);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/calendar/listing/'.$id.'/batch', $parameters);
    }
}
