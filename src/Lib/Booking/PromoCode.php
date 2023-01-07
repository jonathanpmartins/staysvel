<?php

namespace Staysvel\Lib\Booking;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class PromoCode extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/booking/promo-codes', $parameters);
    }

    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/booking/promo-codes', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/booking/promo-codes/'.$id);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/booking/promo-codes/'.$id, $parameters);
    }

    public function delete(string $id): Response
    {
        return $this->http()->delete('/booking/promo-codes/'.$id);
    }
}
