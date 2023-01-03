<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Finance\PaymentProvider;

class Finance
{
    public function paymentProviders(): PaymentProvider
    {
        return new PaymentProvider();
    }
}
