<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootModel;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\Skeleton\Definition\PHP\Parameter;

/**
 * @see BroadwayAggregateRootModelHandlerSpec
 * @see BroadwayAggregateRootModelHandlerTest
 */
class BroadwayAggregateRootModelHandler
{
    /** @var EventSourcedAggregateRootSourceFactory */
    private $aggregateRootSourceFactory;

    public function __construct(EventSourcedAggregateRootSourceFactory $aggregateRootSourceFactory)
    {
        $this->aggregateRootSourceFactory = $aggregateRootSourceFactory;
    }

    public function handleCreateBroadwayAggregateRootModel(CreateBroadwayAggregateRootModel $command): array
    {
        $rootIdParam = new Parameter(lcfirst($command->getRootIdClassName()->getName()), $command->getRootIdClassName());

        return [
            $this->aggregateRootSourceFactory->create($command->getModelClassName(), $rootIdParam),
        ];
    }
}
