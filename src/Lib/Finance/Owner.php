<?php

namespace Staysvel\Lib\Finance;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Owner extends Api
{
    public function search(array $parameters = []): Response
    {
        return $this->http()->get('/finance/owners', $parameters);
    }

    public function get(string $id): Response
    {
        return $this->http()->get('/finance/owners/'.$id);
    }

    public function getByIdAndListing(string $id, string $listing): Response
    {
        return $this->http()->get('/finance/owners/'.$id.'/'.$listing);
    }
}
