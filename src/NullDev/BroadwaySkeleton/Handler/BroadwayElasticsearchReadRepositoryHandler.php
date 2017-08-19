<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadRepositorySourceFactory;

/**
 * @see BroadwayElasticsearchReadRepositoryHandlerSpec
 * @see BroadwayElasticsearchReadRepositoryHandlerTest
 */
class BroadwayElasticsearchReadRepositoryHandler
{
    /** @var ReadRepositorySourceFactory */
    private $readRepositorySourceFactory;

    public function __construct(ReadRepositorySourceFactory $readRepositorySourceFactory)
    {
        $this->readRepositorySourceFactory = $readRepositorySourceFactory;
    }

    public function handleCreateBroadwayElasticsearchReadRepository(CreateBroadwayElasticsearchReadRepository $command): array
    {
        return [
            $this->readRepositorySourceFactory->create($command->getRepositoryClassType()),
        ];
    }
}
