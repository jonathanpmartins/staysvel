<?php

namespace Staysvel\Lib;

use Staysvel\Lib\Translation\Amenity;
use Staysvel\Lib\Translation\Type;

class Translation
{
    public function types(): Type
    {
        return new Type();
    }

    public function amenities(): Amenity
    {
        return new Amenity();
    }
}
