<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Price\Region;
use Staysvel\Lib\Price\Rule;
use Staysvel\Lib\Price\Sell;

class Price extends Api
{
    public function regions(): Region
    {
        return (new Region())->timeout($this->timeout)->connectTimeout($this->connectTimeout);
    }

    public function rules(): Rule
    {
        return (new Rule())->timeout($this->timeout)->connectTimeout($this->connectTimeout);
    }

    public function sells(): Sell
    {
        return (new Sell())->timeout($this->timeout)->connectTimeout($this->connectTimeout);
    }
}
