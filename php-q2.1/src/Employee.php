<?php

namespace App;

/**
 * Instead of extending the Person class as most people would do,
 * I chose to have this class wrap a Person object. I believe
 * encapsulation is almost always preferable to inheritance as
 * not only is it more flexible, it ensures that interactions
 * between classes are forced to use public APIs and therefore
 * no unnecessary knowledge of the other class' inner workings.
 */
class Employee
{
    private $person;
    private $id;

    public function __construct(Person $person, int $id)
    {
        $this->person = $person;
        $this->id = $id;
    }
    
    public function __get($attr)
    {
        if (property_exists($this->$attr)) {
            return $this->$attr;
        }
        if (property_exists($this->person->$attr)) {
            return $this->person->$attr;
        }
        throw new \RuntimeException('Invalid attribute');
    }
}
