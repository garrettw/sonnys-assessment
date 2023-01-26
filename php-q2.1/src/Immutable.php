<?php

namespace App;

trait Immutable
{
    /**
     * This reusable method provides a simple API for "modifying" properties of immutable objects by
     * returning a new copy with the desired value(s) changed.
     *
     * Known issue: this uses a mechanism that does not call the class constructor to make a new object,
     * which means that changed properties cannot have their new values type-checked by the
     * constructor. There are several ways that type-checking could be accomplished, but I don't
     * want to go too deep down that rabbit hole here as I think it's probably overkill for this
     * task and I've probably gone plenty far already.
     *
     * @param array $newProps the list of properties to be changed (as keys) with their new values
     * @return static
     */
    public function with(array $newProps)
    {
        $newObj = clone $this;
        foreach ($newProps as $prop => $val) {
            if (property_exists($newObj, $prop)) {
                $newObj->$prop = $val;
            }
        }
        return $newObj;
    }
}
