<?php

declare(strict_types=1);

namespace MyVendor\User;

use DateTime;

/**
 * @see \spec\MyVendor\User\UserCreatedAtSpec
 * @see \Tests\MyVendor\User\UserCreatedAtTest
 */
class UserCreatedAt extends DateTime
{
    const RANDOM_CONST = 346;

    public static function createFromFormat($format, $time, $object = null): self
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }

    public function __toString(): string
    {
        return $this->format('c');
    }

    public function serialize(): string
    {
        return $this->__toString();
    }

    public static function deserialize($value): self
    {
        return new self($value);
    }
}
