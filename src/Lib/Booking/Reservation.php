<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;
use Staysvel\Lib\Booking\Reservation\ReservationExport;
use Staysvel\Lib\Booking\Reservation\ReservationExtraService;
use Staysvel\Lib\Booking\Reservation\ReservationPayment;

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

    public function extras(): ReservationExtraService
    {
        return (new ReservationExtraService())->timeout($this->timeout);
    }

    public function payments(): ReservationPayment
    {
        return (new ReservationPayment())->timeout($this->timeout);
    }

    public function export(): ReservationExport
    {
        return (new ReservationExport())->timeout($this->timeout);
    }
}
