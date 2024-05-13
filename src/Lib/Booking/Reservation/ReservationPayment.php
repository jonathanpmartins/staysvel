<?php

namespace Staysvel\Lib\Booking\Reservation;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class ReservationPayment extends Api
{
    public function list(string $id): Response
    {
        return $this->http()->get('/booking/reservations/'.$id.'/payments');
    }

    public function create(string $id, $parameters = []): Response
    {
        return $this->http()->post('/booking/reservations/'.$id.'/payments', $parameters);
    }

    public function update(string $id, string $extraId, array $parameters = []): Response
    {
        return $this->http()->patch('/booking/reservations/'.$id.'/payments'.$extraId, $parameters);
    }

    public function delete(string $id, string $extraId): Response
    {
        return $this->http()->delete('/booking/reservations/'.$id.'/payments'.$extraId);
    }
}
