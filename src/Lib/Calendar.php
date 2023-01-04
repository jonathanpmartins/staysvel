<?php

namespace Staysvel\Lib;

use Staysvel\Lib\Calendar\Listing;

class Calendar
{
    public function listings(): Listing
    {
        return new Listing();
    }
}
