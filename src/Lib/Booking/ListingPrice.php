<?php

namespace Stays\Lib\Booking;

use Stays\Api;

class ListingPrice extends Api
{
    public function calculate(array $parameters = []): array
    {
        return $this->http()->post('/booking/calculate-price', $parameters);
    }
}
