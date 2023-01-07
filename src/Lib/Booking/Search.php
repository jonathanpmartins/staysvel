<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Search extends Api
{
    public function filters(): Response
    {
        return $this->http()->get('/booking/searchfilter');
    }

    public function listings(array $parameters = []): Response
    {
        return $this->http()->post('/booking/search-listings', $parameters);
    }
}
