<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadProjectorSourceFactory;

/**
 * @see BroadwayElasticsearchReadProjectorHandlerSpec
 * @see BroadwayElasticsearchReadProjectorHandlerTest
 */
class BroadwayElasticsearchReadProjectorHandler
{
    /** @var ReadProjectorSourceFactory */
    private $readProjectorSourceFactory;

    public function __construct(ReadProjectorSourceFactory $readProjectorSourceFactory)
    {
        $this->readProjectorSourceFactory  = $readProjectorSourceFactory;
    }

    public function handleCreateBroadwayElasticsearchReadProjector(CreateBroadwayElasticsearchReadProjector $command): array
    {
        return [
            $this->readProjectorSourceFactory->create($command->getProjectorClassType(), $command->getEntityParameters()),
        ];
    }
}
