<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Calendar\Listing;

class Calendar extends Api
{
    public function listings(): Listing
    {
        return (new Listing())->timeout($this->timeout);
    }
}
