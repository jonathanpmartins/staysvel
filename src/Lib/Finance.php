<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Finance\Owner;
use Staysvel\Lib\Finance\PaymentProvider;

class Finance extends Api
{
    public function paymentProviders(): PaymentProvider
    {
        return (new PaymentProvider())->timeout($this->timeout);
    }

    public function owners(): Owner
    {
        return (new Owner())->timeout($this->timeout);
    }
}
