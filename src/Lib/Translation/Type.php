<?php

namespace Staysvel\Lib\Translation;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Type extends Api
{
    public function multiUnitProperty(): Response
    {
        return $this->http()->get('/translation/multi-unit-property-types');
    }

    public function singleUnitProperty(): Response
    {
        return $this->http()->get('/translation/single-unit-property-types');
    }

    public function listing(): Response
    {
        return $this->http()->get('/translation/listing-types');
    }

    public function room(): Response
    {
        return $this->http()->get('/translation/room-types');
    }

    public function bedroom(): Response
    {
        return $this->http()->get('/translation/bedroom-types');
    }

    public function bathroom(): Response
    {
        return $this->http()->get('/translation/bathroom-types');
    }

    public function other(): Response
    {
        return $this->http()->get('/translation/other-living-room-types');
    }

    public function bed(): Response
    {
        return $this->http()->get('/translation/bed-types');
    }
}
