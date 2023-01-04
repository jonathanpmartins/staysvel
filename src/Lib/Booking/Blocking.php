<?php

namespace Stays\Lib\Booking;

use Stays\Api;

class Blocking extends Api
{
    public function create(array $parameters = []): array
    {
        return $this->http()->post('/booking/reservations', $parameters);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/booking/reservations/'.$id, $parameters);
    }

    public function delete(string $id): array
    {
        return $this->http()->delete('/booking/reservations/' . $id);
    }
}
