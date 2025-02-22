<?php

namespace Staysvel\Lib\Setting;

use Illuminate\Http\Client\Response;
use Staysvel\Api;
use Staysvel\Lib\Setting\Listing\HouseRule;

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

    public function houseRules(): HouseRule
    {
        return (new HouseRule())->timeout($this->timeout);
    }
}
