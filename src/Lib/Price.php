<?php

namespace Stays\Lib;

use Stays\Lib\Price\Region;
use Stays\Lib\Price\Rule;
use Stays\Lib\Price\Sell;

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
