<?php

declare(strict_types=1);

namespace MyVendor\Theater\Domain;

use Broadway\EventSourcing\SimpleEventSourcedEntity;

/**
 * @see \spec\MyVendor\Theater\Domain\ActorEntitySpec
 * @see \Tests\MyVendor\Theater\Domain\ActorEntityTest
 */
class ActorEntity extends SimpleEventSourcedEntity
{
    /** @var int */
    private $id;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    public function __construct(int $id, string $firstName, string $lastName)
    {
        $this->id        = $id;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }
}
