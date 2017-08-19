<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadEntitySourceFactory;

/**
 * @see BroadwayElasticsearchReadEntityHandlerSpec
 * @see BroadwayElasticsearchReadEntityHandlerTest
 */
class BroadwayElasticsearchReadEntityHandler
{
    /** @var ReadEntitySourceFactory */
    private $readEntitySourceFactory;

    public function __construct(ReadEntitySourceFactory $readEntitySourceFactory)
    {
        $this->readEntitySourceFactory     = $readEntitySourceFactory;
    }

    public function handleCreateBroadwayElasticsearchReadEntity(CreateBroadwayElasticsearchReadEntity $command): array
    {
        return [
            $this->readEntitySourceFactory->create($command->getEntityClassType(), $command->getEntityParameters()),
        ];
    }
}
