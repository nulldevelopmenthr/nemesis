<?php

declare(strict_types=1);

namespace Nesto\Domain;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;

class MiroRepository extends EventSourcingRepository
{
    public function __construct(EventStore $eventStore, EventBus $eventBus, array $eventStreamDecorators = [])
    {
        parent::__construct($eventStore, $eventBus, MiroModel::class, new PublicConstructorAggregateFactory(), $eventStreamDecorators);
    }
}
