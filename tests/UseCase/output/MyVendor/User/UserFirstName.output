<?php

declare(strict_types=1);

namespace MyVendor\User;

/**
 * @see \spec\MyVendor\User\UserFirstNameSpec
 * @see \Tests\MyVendor\User\UserFirstNameTest
 */
class UserFirstName
{
    const RANDOM_CONST = 142;

    /** @var string */
    private $firstName;

    public function __construct(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getValue(): string
    {
        return $this->firstName;
    }

    public function __toString(): string
    {
        return $this->firstName;
    }

    public function serialize(): string
    {
        return $this->firstName;
    }

    public static function deserialize(string $firstName): self
    {
        return new self($firstName);
    }
}
