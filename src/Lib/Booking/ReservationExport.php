<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class ReservationExport extends Api
{
    public function json(array $parameters = []): Response
    {
        return $this->http()->post('/booking/reservations-export', $parameters);
    }

    public function xlsx(array $parameters = []): Response
    {
        return $this->http()->isXlsx()->get('/booking/reservations-export', $parameters);
    }
}
