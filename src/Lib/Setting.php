<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Booking\PromoCode;

class Setting
{
    public function listing(): PromoCode
    {
        return new PromoCode();
    }
}
