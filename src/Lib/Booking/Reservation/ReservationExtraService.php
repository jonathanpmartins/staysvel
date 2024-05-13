<?php

namespace Staysvel\Lib\Booking\Reservation;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class ReservationExtraService extends Api
{
    public function list(string $id): Response
    {
        return $this->http()->get('/booking/reservations/'.$id.'/extra-services');
    }

    public function create(string $id, $parameters = []): Response
    {
        return $this->http()->post('/booking/reservations/'.$id.'/extra-services', $parameters);
    }

    public function get(string $id, string $extraId): Response
    {
        return $this->http()->get('/booking/reservations/'.$id.'/extra-services'.$extraId);
    }

    public function update(string $id, string $extraId, array $parameters = []): Response
    {
        return $this->http()->patch('/booking/reservations/'.$id.'/extra-services'.$extraId, $parameters);
    }

    public function delete(string $id, string $extraId): Response
    {
        return $this->http()->delete('/booking/reservations/'.$id.'/extra-services'.$extraId);
    }
}
