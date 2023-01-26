<?php

namespace App;

/**
 * @property-read string $firstName
 * @property-read string|null $middleName
 * @property-read string|null $lastName
 */
class Pet
{
    use Immutable;

    /** @var string */
    private $firstName;
    
    /** @var string|null */
    private $middleName;

    /** @var string|null */
    private $lastName;

    public function __construct(string $firstName, ?string $middleName = null, ?string $lastName = null)
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
    }
    
    public function __get($attr)
    {
        return $this->$attr;
    }
}
