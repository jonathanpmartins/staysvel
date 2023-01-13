<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Setting\Listing;

class Setting extends Api
{
    public function listing(): Listing
    {
        return (new Listing())->timeout($this->timeout);
    }
}
