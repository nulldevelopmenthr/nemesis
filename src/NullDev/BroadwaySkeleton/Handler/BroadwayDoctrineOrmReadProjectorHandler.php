<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadProjector;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory;

/**
 * @see BroadwayDoctrineOrmReadProjectorHandlerSpec
 * @see BroadwayDoctrineOrmReadProjectorHandlerTest
 */
class BroadwayDoctrineOrmReadProjectorHandler
{
    /** @var ReadProjectorSourceFactory */
    private $readProjectorSourceFactory;

    public function __construct(ReadProjectorSourceFactory $readProjectorSourceFactory)
    {
        $this->readProjectorSourceFactory  = $readProjectorSourceFactory;
    }

    public function handleCreateBroadwayDoctrineOrmReadProjector(CreateBroadwayDoctrineOrmReadProjector $command): array
    {
        return [
            $this->readProjectorSourceFactory->create($command->getProjectorClassType(), $command->getEntityParameters()),
        ];
    }
}
