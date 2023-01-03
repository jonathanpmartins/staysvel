<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Calendar\Listing;

class Calendar
{
    public function listings(): Listing
    {
        return new Listing();
    }
}
