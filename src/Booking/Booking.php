<?php

namespace Stays\Api\Booking;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Stays\Api\Stays;

class Booking extends Stays
{
    public function searchFilter(): object
    {
        return $this->get('/booking/searchfilter');
    }
}
