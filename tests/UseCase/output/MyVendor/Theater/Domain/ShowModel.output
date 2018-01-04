<?php

declare(strict_types=1);

namespace MyVendor\Theater\Domain;

use Broadway\EventSourcing\EventSourcedAggregateRoot;

/**
 * @see \spec\MyVendor\Theater\Domain\ShowModelSpec
 * @see \Tests\MyVendor\Theater\Domain\ShowModelTest
 */
class ShowModel extends EventSourcedAggregateRoot
{
    public function __construct()
    {
    }

    public function getAggregateRootId(): string
    {
        return $this->id;
    }
}
