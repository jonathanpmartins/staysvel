<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Booking\PromoCode;

class Translation
{
    public function types(): PromoCode
    {
        return new PromoCode();
    }
}
