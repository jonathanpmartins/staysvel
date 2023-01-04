<?php

namespace Stays\Lib;

use Stays\Lib\Translation\Amenity;
use Stays\Lib\Translation\Type;

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
