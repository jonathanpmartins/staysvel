<?php

namespace Staysvel\Lib;

use Staysvel\Lib\Finance\PaymentProvider;

class Finance
{
    public function paymentProviders(): PaymentProvider
    {
        return new PaymentProvider();
    }
}
