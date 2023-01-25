<?php

namespace App;

class Person
{
    protected $firstName;
    protected $middleName;
    protected $lastName;
    
    public function __construct($last, $first, $middle = null)
    {
        $this->lastName = $last;
        $this->firstName = $first;
        $this->middleName = $middle;
    }
}
