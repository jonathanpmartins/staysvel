<?php

namespace Stays\Lib;

use Stays\Lib\Calendar\Listing;

class Calendar
{
    public function listings(): Listing
    {
        return new Listing();
    }
}
