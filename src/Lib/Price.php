<?php

namespace Staysvel\Lib;

use Staysvel\Lib\Price\Region;
use Staysvel\Lib\Price\Rule;
use Staysvel\Lib\Price\Sell;

class Price
{
    public function regions(): Region
    {
        return new Region();
    }

    public function rules(): Rule
    {
        return new Rule();
    }

    public function sells(): Sell
    {
        return new Sell();
    }
}
