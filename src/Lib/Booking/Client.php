<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Client extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/booking/clients', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/booking/clients/'.$id);
    }
}
