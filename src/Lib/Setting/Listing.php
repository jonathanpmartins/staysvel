<?php

namespace Staysvel\Lib\Setting;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Listing extends Api
{
    public function price(string $id): Response
    {
        return $this->http()->get('/settings/listing/'.$id.'/sellprice');
    }

    public function booking(string $id): Response
    {
        return $this->http()->get('/settings/listing/'.$id.'/booking');
    }
}
