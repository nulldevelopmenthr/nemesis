<?php

declare(strict_types=1);

namespace MyVendor\User;

/**
 * @see \spec\MyVendor\User\UserIdSpec
 * @see \Tests\MyVendor\User\UserIdTest
 */
class UserId
{
    /** @var int */
    private $id;


    public function __construct(int $id)
    {
        $this->id = $id;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function __toString(): string
    {
        return (string) $this->id;
    }


    public function serialize(): int
    {
        return $this->id;
    }


    public static function deserialize(int $id): self
    {
        return new self($id);
    }
}
