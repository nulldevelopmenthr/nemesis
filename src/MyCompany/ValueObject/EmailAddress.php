<?php

declare(strict_types=1);

namespace MyCompany\ValueObject;

/**
 * Represents value object class with string as constructor argument.
 */
class EmailAddress
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
