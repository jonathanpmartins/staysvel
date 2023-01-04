<?php

namespace Stays\Lib\Booking;

use Stays\Api;

class Client extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/booking/clients', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/booking/clients/'.$id);
    }
}
