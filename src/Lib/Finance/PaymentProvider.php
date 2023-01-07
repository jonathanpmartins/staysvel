<?php

namespace Staysvel\Lib\Finance;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class PaymentProvider extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/finance/payment-providers', $parameters);
    }

    public function create(array $parameters = []): Response
    {
        return $this->http()->post('/finance/payment-providers', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/finance/payment-providers/'.$id);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/finance/payment-providers/'.$id, $parameters);
    }
}
