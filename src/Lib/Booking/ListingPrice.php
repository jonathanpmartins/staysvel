<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class ListingPrice extends Api
{
    public function calculate(array $parameters = []): Response
    {
        return $this->http()->post('/booking/calculate-price', $parameters);
    }
}
