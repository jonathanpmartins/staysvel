<?php

namespace Stays\Lib;

use Stays\Lib\Booking\PromoCode;
use Stays\Lib\Setting\Listing;

class Setting
{
    public function listing(): Listing
    {
        return new Listing();
    }
}
