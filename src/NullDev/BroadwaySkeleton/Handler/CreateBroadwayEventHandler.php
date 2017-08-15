<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory;

/**
 * @see CreateBroadwayEventHandlerSpec
 * @see CreateBroadwayEventHandlerTest
 */
class CreateBroadwayEventHandler
{
    /** @var EventSourceFactory */
    private $eventSourceFactory;

    public function __construct(EventSourceFactory $eventSourceFactory)
    {
        $this->eventSourceFactory = $eventSourceFactory;
    }

    public function handleCreateBroadwayEvent(CreateBroadwayEvent $command): array
    {
        $class = $this->eventSourceFactory->create($command->getClassType(), $command->getParameters());

        return [$class];
    }
}
