<?php

namespace Stays\Lib\Booking;

use Stays\Api;

class Search extends Api
{
    public function filters(): array
    {
        return $this->http()->get('/booking/searchfilter');
    }

    public function listings(array $parameters = []): array
    {
        return $this->http()->post('/booking/search-listings', $parameters);
    }
}
