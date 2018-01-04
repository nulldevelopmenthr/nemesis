<?php

declare(strict_types=1);

namespace MyVendor\Theater\Application;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use MyVendor\Theater\Domain\ShowModel;

/**
 * @see \spec\MyVendor\Theater\Application\ShowRepositorySpec
 * @see \Tests\MyVendor\Theater\Application\ShowRepositoryTest
 */
class ShowRepository extends EventSourcingRepository
{
    public function __construct(EventStore $eventStore, EventBus $eventBus, array $eventStreamDecorators = [])
    {
        parent::__construct(
            $eventStore,
            $eventBus,
            ShowModel::class,
            new PublicConstructorAggregateFactory(),
            $eventStreamDecorators
        );
    }
}
