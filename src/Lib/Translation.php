<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Translation\Amenity;
use Stays\Api\Lib\Translation\Type;

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
