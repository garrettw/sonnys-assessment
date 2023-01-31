<?php

namespace App\Provided;

class TVRemote implements RemoteControl
{
    private $tv;

    public function __construct(Television $tv)
    {
        $this->tv = $tv;
    }

    public function powerOn()
    {
        $this->tv->setPower(true);
    }
}
