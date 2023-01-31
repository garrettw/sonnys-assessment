<?php

namespace App;

use App\Provided\RemoteControl;

class RemoteUser
{
    /** @var RemoteControl|null */
    private $heldRemote;
    
    /**
     * We have the option of constructing a user with a remote already in his hand, but that is optional.
     */
    public function __construct(?RemoteControl $remote = null)
    {
        $this->heldRemote = $remote;
    }
    
    /**
     * We can have the user press the Power On button of a remote he already holds, or of another arbitrary remote.
     */
    public function pressPowerOn(?RemoteControl $remote = null)
    {
        $remote = $remote ?? $this->heldRemote;
        if (!isset($remote)) {
            throw new \LogicException('No remote present!');
        }
        $remote->powerOn();
    }
    
    /**
     * Pick up a new remote, or replace the one in hand with a different one.
     */
    public function holdRemote(RemoteControl $remote)
    {
        $this->heldRemote = $remote;
    }
    
    /**
     * Drop the remote currently in hand.
     */
    public function dropRemote()
    {
        $this->heldRemote = null;
    }
}
