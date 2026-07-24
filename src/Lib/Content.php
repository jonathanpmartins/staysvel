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
        return (new Property())->timeout($this->timeout)->connectTimeout($this->connectTimeout);
    }

    public function listings(): Listing
    {
        return (new Listing())->timeout($this->timeout)->connectTimeout($this->connectTimeout);
    }

    public function groups(): Group
    {
        return (new Group())->timeout($this->timeout)->connectTimeout($this->connectTimeout);
    }

    public function rooms(): Room
    {
        return (new Room())->timeout($this->timeout)->connectTimeout($this->connectTimeout);
    }
}
