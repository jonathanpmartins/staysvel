<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Blocking extends Api
{
    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/booking/reservations', $parameters);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/booking/reservations/'.$id, $parameters);
    }

    public function delete(string $id): Response
    {
        return $this->http()->delete('/booking/reservations/' . $id);
    }
}
