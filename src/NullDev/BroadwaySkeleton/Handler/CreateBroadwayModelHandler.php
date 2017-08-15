<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\Skeleton\Uuid\SourceFactory\Uuid4IdentitySourceFactory;

/**
 * @see CreateBroadwayModelHandlerSpec
 * @see CreateBroadwayModelHandlerTest
 */
class CreateBroadwayModelHandler
{
    /** @var Uuid4IdentitySourceFactory */
    private $uuid4IdentitySourceFactory;
    /** @var EventSourcedAggregateRootSourceFactory */
    private $aggregateRootSourceFactory;
    /** @var EventSourcingRepositorySourceFactory */
    private $repositorySourceFactory;

    public function __construct(
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        EventSourcedAggregateRootSourceFactory $aggregateRootSourceFactory,
        EventSourcingRepositorySourceFactory $repositorySourceFactory
    ) {
        $this->uuid4IdentitySourceFactory = $uuid4IdentitySourceFactory;
        $this->aggregateRootSourceFactory = $aggregateRootSourceFactory;
        $this->repositorySourceFactory    = $repositorySourceFactory;
    }

    public function handleCreateBroadwayModel(CreateBroadwayModel $command): array
    {
        $classes = [
            $this->uuid4IdentitySourceFactory->create($command->getRootIdClassName()),
            $this->aggregateRootSourceFactory->create($command->getModelClassName(), $command->getRootIdAsParameter()),
            $this->repositorySourceFactory->create($command->getRepositoryClassName(), $command->getModelClassName()),
        ];

        return $classes;
    }
}
