<?php

namespace Staysvel\Lib;

use Illuminate\Http\Client\Response;
use Staysvel\Api;

class Doc extends Api
{
    public function get(): Response
    {
        return $this->http()->get('/docs');
    }
}
