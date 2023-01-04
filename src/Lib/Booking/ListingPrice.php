<?php

namespace Staysvel\Lib\Booking;

use Staysvel\Api;

class ListingPrice extends Api
{
    public function calculate(array $parameters = []): array
    {
        return $this->http()->post('/booking/calculate-price', $parameters);
    }
}
