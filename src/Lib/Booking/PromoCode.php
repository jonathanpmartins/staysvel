<?php

namespace Stays\Api\Lib\Booking;

use Stays\Api\Api;

class PromoCode extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/booking/promo-codes', $parameters);
    }

    public function create(array $parameters = []): array
    {
        return $this->http()->post('/booking/promo-codes', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/booking/promo-codes/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/booking/promo-codes/'.$id, $parameters);
    }

    public function delete(string $id): array
    {
        return $this->http()->delete('/booking/promo-codes/'.$id);
    }
}
