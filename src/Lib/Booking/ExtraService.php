<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class ExtraService extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/booking/reservations/extra-services', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/booking/reservations/extra-services'.$id);
    }
}
