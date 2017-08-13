<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadEntitySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadProjectorSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\ElasticSearch\ReadRepositorySourceFactory;

/**
 * @see CreateBroadwayElasticSearchReadHandlerSpec
 * @see CreateBroadwayElasticSearchReadHandlerTest
 */
class CreateBroadwayElasticSearchReadHandler
{
    /** @var ReadEntitySourceFactory */
    private $readEntitySourceFactory;
    /** @var ReadRepositorySourceFactory */
    private $readRepositorySourceFactory;
    /** @var ReadProjectorSourceFactory */
    private $readProjectorSourceFactory;

    public function __construct(
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory
    ) {
        $this->readEntitySourceFactory     = $readEntitySourceFactory;
        $this->readRepositorySourceFactory = $readRepositorySourceFactory;
        $this->readProjectorSourceFactory  = $readProjectorSourceFactory;
    }

    public function handle(CreateBroadwayElasticSearchRead $command): array
    {
        $classes = [
            $this->readEntitySourceFactory->create($command->getEntityClassType(), $command->getEntityParameters()),
            $this->readRepositorySourceFactory->create($command->getRepositoryClassType()),
            $this->readProjectorSourceFactory->create($command->getProjectorClassType(), $command->getEntityParameters()),
        ];

        return $classes;
    }
}
