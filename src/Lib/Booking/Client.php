<?php

namespace Staysvel\Lib\Booking;

use Staysvel\Api;

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
