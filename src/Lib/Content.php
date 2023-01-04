<?php

namespace Stays\Lib;

use Stays\Lib\Content\Group;
use Stays\Lib\Content\Listing;
use Stays\Lib\Content\Property;

class Content
{
    public function properties(): Property
    {
        return new Property();
    }

    public function listings(): Listing
    {
        return new Listing();
    }

    public function groups(): Group
    {
        return new Group();
    }
}
