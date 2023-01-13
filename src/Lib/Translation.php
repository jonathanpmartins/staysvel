<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Translation\Amenity;
use Staysvel\Lib\Translation\Type;

class Translation extends Api
{
    public function types(): Type
    {
        return (new Type())->timeout($this->timeout);
    }

    public function amenities(): Amenity
    {
        return (new Amenity())->timeout($this->timeout);
    }
}
