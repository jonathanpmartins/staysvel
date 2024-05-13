<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Content\Group;
use Staysvel\Lib\Content\Listing;
use Staysvel\Lib\Content\Property;
use Staysvel\Lib\Content\Room;

class Content extends Api
{
    public function properties(): Property
    {
        return (new Property())->timeout($this->timeout);
    }

    public function listings(): Listing
    {
        return (new Listing())->timeout($this->timeout);
    }

    public function groups(): Group
    {
        return (new Group())->timeout($this->timeout);
    }

    public function rooms(): Room
    {
        return (new Room())->timeout($this->timeout);
    }
}
