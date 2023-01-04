<?php

namespace Stays\Lib\Booking;

use Stays\Api;

class ReservationExport extends Api
{
    public function json(array $parameters = []): array
    {
        return $this->http()->post('/booking/reservations-export', $parameters);
    }

    public function xlsx(array $parameters = []): mixed
    {
        return $this->http($isXlsx = true)->get('/booking/reservations-export', $parameters);
    }
}
