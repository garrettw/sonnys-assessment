<?php

namespace App;

use App\Provided\CableBox;
use App\Provided\RemoteControl;
use App\Provided\Television;

class UniversalRemote implements RemoteControl
{
    /** @var Television|null */
    private $tv;
    
    /** @var CableBox|null */
    private $cableBox;
    
    public function __construct(?Television $tv = null, ?CableBox $cableBox = null)
    {
        $this->tv = $tv;
        $this->cableBox = $cableBox;
    }
    
    /**
     * Turns on all devices associated with this remote (at most 1 TV and 1 cable box).
     */
    public function powerOn()
    {
        if (isset($this->tv)) {
            $this->tv->setPower(true);
        }
        if (isset($this->cableBox)) {
            $this->cableBox->setPower(true);
        }
    }
}
