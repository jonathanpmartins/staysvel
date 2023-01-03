<?php

namespace Stays\Api\Lib;

use Stays\Api\Lib\Content\Group;
use Stays\Api\Lib\Content\Listing;
use Stays\Api\Lib\Content\Property;

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
