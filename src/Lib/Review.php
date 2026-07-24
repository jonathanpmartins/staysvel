<?php

namespace Staysvel\Lib;

use Staysvel\Api;
use Staysvel\Lib\Review\Guest;

class Review extends Api
{
    public function guest(): Guest
    {
        return (new Guest())->timeout($this->timeout)->connectTimeout($this->connectTimeout);
    }
}
