<?php

declare(strict_types=1);

namespace MyVendor\Theater\Domain\Command;

use MyVendor\Theater\Core\Actor;
use MyVendor\Theater\Core\ShowId;

/**
 * @see \spec\MyVendor\Theater\Domain\Command\AddActorToCastSpec
 * @see \Tests\MyVendor\Theater\Domain\Command\AddActorToCastTest
 */
class AddActorToCast
{
    /** @var ShowId */
    private $id;

    /** @var Actor */
    private $actor;

    public function __construct(ShowId $id, Actor $actor)
    {
        $this->id    = $id;
        $this->actor = $actor;
    }

    public function getId(): ShowId
    {
        return $this->id;
    }

    public function getActor(): Actor
    {
        return $this->actor;
    }

    public function serialize(): array
    {
        return [
            'id'    => $this->id->serialize(),
            'actor' => $this->actor->serialize(),
        ];
    }

    public static function deserialize(array $data): self
    {
        return new self(
            ShowId::deserialize($data['id']),
            Actor::deserialize($data['actor'])
        );
    }
}
