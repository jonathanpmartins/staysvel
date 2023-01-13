<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Reservation extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/booking/reservations', $parameters);
    }

    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/booking/reservations', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/booking/reservations/'.$id);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/booking/reservations/'.$id, $parameters);
    }

    public function cancel(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/booking/reservations/'.$id, $parameters);
    }

    public function delete(string $id): Response
    {
        return $this->http()->delete('/booking/reservations/'.$id);
    }

    public function export(): ReservationExport
    {
        return (new ReservationExport())->timeout($this->timeout);
    }
}
