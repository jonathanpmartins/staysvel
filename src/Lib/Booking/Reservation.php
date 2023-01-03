<?php

namespace Stays\Api\Lib\Booking;

use Stays\Api\Api;

class Reservation extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/booking/reservations', $parameters);
    }

    public function create(array $parameters = []): array
    {
        return $this->http()->post('/booking/reservations', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/booking/reservations/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/booking/reservations/'.$id, $parameters);
    }

    public function cancel(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/booking/reservations/'.$id, $parameters);
    }

    public function delete(string $id): array
    {
        return $this->http()->delete('/booking/reservations/'.$id);
    }

    public function export(): ReservationExport
    {
        return new ReservationExport();
    }
}
