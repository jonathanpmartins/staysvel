<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Price\Region;
use Stays\Api\Lib\Price\Rule;
use Stays\Api\Lib\Price\Sell;

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
