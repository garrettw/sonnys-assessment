<?php

namespace App;

/**
 * @property-read string $lastName
 * @property-read string $firstName
 * @property-read string|null $middleName
 */
class Person
{
    private $lastName;
    private $firstName;
    private $middleName;
    
    public function __construct(string $last, string $first, $middle = null)
    {
        $this->lastName = $last;
        $this->firstName = $first;
        $this->middleName = $middle;
    }
    
    public function __get($attr)
    {
        return $this->$attr;
    }
}
