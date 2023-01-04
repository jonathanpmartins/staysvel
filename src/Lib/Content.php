<?php

namespace Staysvel\Lib;

use Staysvel\Lib\Content\Group;
use Staysvel\Lib\Content\Listing;
use Staysvel\Lib\Content\Property;

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
