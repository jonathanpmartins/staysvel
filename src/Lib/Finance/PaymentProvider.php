<?php

namespace Staysvel\Lib\Finance;

use Staysvel\Api;

class PaymentProvider extends Api
{
    public function search(array $parameters = []): array
    {
        return $this->http()->get('/finance/payment-providers', $parameters);
    }

    public function create(array $parameters = []): array
    {
        return $this->http()->post('/finance/payment-providers', $parameters);
    }

    public function get(string $id): array
    {
        return $this->http()->get('/finance/payment-providers/'.$id);
    }

    public function update(string $id, array $parameters = []): array
    {
        return $this->http()->patch('/finance/payment-providers/'.$id, $parameters);
    }
}
