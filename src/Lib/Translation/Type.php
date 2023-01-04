<?php

namespace Staysvel\Lib\Translation;

use Staysvel\Api;

class Type extends Api
{
    public function multiUnitProperty(): array
    {
        return $this->http()->get('/translation/multi-unit-property-types');
    }

    public function singleUnitProperty(): array
    {
        return $this->http()->get('/translation/single-unit-property-types');
    }

    public function listing(): array
    {
        return $this->http()->get('/translation/listing-types');
    }

    public function room(): array
    {
        return $this->http()->get('/translation/room-types');
    }

    public function bedroom(): array
    {
        return $this->http()->get('/translation/bedroom-types');
    }

    public function bathroom(): array
    {
        return $this->http()->get('/translation/bathroom-types');
    }

    public function other(): array
    {
        return $this->http()->get('/translation/other-living-room-types');
    }

    public function bed(): array
    {
        return $this->http()->get('/translation/bed-types');
    }
}
