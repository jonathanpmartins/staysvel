<?php

namespace Staysvel;

class Api
{
    protected int $timeout = 60;

    public function timeout(int $timeoutInSeconds = 60): static
    {
        $this->timeout = $timeoutInSeconds;

        return $this;
    }

    protected function http(): Http
    {
        return (new Http())->timeout($this->timeout);
    }
}
