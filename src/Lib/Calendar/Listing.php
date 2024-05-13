<?php

namespace Staysvel\Lib\Calendar;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Listing extends Api
{
    public function get(string $id, array $parameters = []): Response
    {
        return $this->http()->get('/calendar/listing/'.$id, $parameters);
    }

    public function update(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/calendar/listing/'.$id.'/batch', $parameters);
    }

    public function prices(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/calendar/listing/'.$id.'/prices', $parameters);
    }

    public function restrictions(string $id, array $parameters = []): Response
    {
        return $this->http()->patch('/calendar/listing/'.$id.'/restrictions', $parameters);
    }
}
