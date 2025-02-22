<?php

namespace Staysvel\Lib\Setting\Listing;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class HouseRule extends Api
{
    public function get(string $id): Response
    {
        return $this->http()->get('/settings/listing/'.$id.'/house-rules');
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/settings/listing/'.$id.'/house-rules', $parameters);
    }
}
