<?php

namespace Stays\Api\Lib\Translation;

use Stays\Api\Api;

class Amenity extends Api
{
    public function property(): array
    {
        return $this->http()->get('/translation/property-amenities');
    }

    public function listing(): array
    {
        return $this->http()->get('/translation/listing-amenities');
    }
}
