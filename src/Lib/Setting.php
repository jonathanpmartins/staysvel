<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Booking\PromoCode;
use Stays\Api\Lib\Setting\Listing;

class Setting
{
    public function listing(): Listing
    {
        return new Listing();
    }
}
