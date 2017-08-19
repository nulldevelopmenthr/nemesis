<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootRepository;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;

/**
 * @see BroadwayAggregateRootRepositoryHandlerSpec
 * @see BroadwayAggregateRootRepositoryHandlerTest
 */
class BroadwayAggregateRootRepositoryHandler
{
    /** @var EventSourcingRepositorySourceFactory */
    private $repositorySourceFactory;

    public function __construct(EventSourcingRepositorySourceFactory $repositorySourceFactory)
    {
        $this->repositorySourceFactory     = $repositorySourceFactory;
    }

    public function handleCreateBroadwayAggregateRootRepository(CreateBroadwayAggregateRootRepository $command): array
    {
        return [
            $this->repositorySourceFactory->create($command->getRepositoryClassName(), $command->getModelClassName()),
        ];
    }
}
