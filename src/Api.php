<?php

namespace Stays\Api;

class Api
{
    protected function http(bool $isXlsx = false): Http
    {
        return new Http($isXlsx);
    }
}