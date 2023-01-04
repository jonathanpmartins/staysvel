<?php

namespace Staysvel\Lib;

use Staysvel\Lib\Booking\PromoCode;
use Staysvel\Lib\Setting\Listing;

class Setting
{
    public function listing(): Listing
    {
        return new Listing();
    }
}
