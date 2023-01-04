<?php

namespace Stays\Lib\Setting;

use Stays\Api;

class Listing extends Api
{
    public function price(string $id): array
    {
        return $this->http()->get('/settings/listing/'.$id.'/sellprice');
    }

    public function booking(string $id): array
    {
        return $this->http()->get('/settings/listing/'.$id.'/booking');
    }
}
