<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Price\Region;

class Price
{
    public function regions(): Region
    {
        return new Region();
    }
}
