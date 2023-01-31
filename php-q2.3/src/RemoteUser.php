<?php

namespace App;

use App\Provided\RemoteControl;

/**
 * We could have a constructor here where we pass in a remote for the user to "hold",
 * along with methods to pick up and drop remotes, but I think it makes more sense
 * for the user here to be immutable and interact with a given remote in a one-off
 * manner when told to. I would feel differently if the user could, say, only
 * interact with one remote at a time, and could only perform certain interactions
 * if exclusive access to the object were granted.
 * This method could, in theory, be marked as static, but I generally avoid that
 * because it can impact testability and future flexibility. If for some reason
 * the remote needed to know about the user in order to communicate back to it, the
 * user (as $this) could be passed to the remote here (but only if not static).
 */
class RemoteUser
{
    public function pressPowerOn(RemoteControl $remote)
    {
        $remote->powerOn();
    }
}
