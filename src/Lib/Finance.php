<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Finance\PaymentProvider;

class Finance extends Api
{
    public function paymentProviders(): PaymentProvider
    {
        return (new PaymentProvider())->timeout($this->timeout);
    }
}
