<?php

namespace Stays\Lib;

use Stays\Lib\Finance\PaymentProvider;

class Finance
{
    public function paymentProviders(): PaymentProvider
    {
        return new PaymentProvider();
    }
}
