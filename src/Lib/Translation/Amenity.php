<?php

namespace Staysvel\Lib\Translation;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Amenity extends Api
{
    public function property(): Response
    {
        return $this->http()->get('/translation/property-amenities');
    }

    public function listing(): Response
    {
        return $this->http()->get('/translation/listing-amenities');
    }
}
