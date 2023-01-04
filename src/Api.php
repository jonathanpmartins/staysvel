<?php

namespace Stays;

class Api
{
    protected function http(bool $isXlsx = false): Http
    {
        return new Http($isXlsx);
    }
}
