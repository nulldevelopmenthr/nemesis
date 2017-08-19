<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadEntity;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory;

/**
 * @see BroadwayDoctrineOrmReadEntityHandlerSpec
 * @see BroadwayDoctrineOrmReadEntityHandlerTest
 */
class BroadwayDoctrineOrmReadEntityHandler
{
    /** @var ReadEntitySourceFactory */
    private $readEntitySourceFactory;

    public function __construct(ReadEntitySourceFactory $readEntitySourceFactory)
    {
        $this->readEntitySourceFactory     = $readEntitySourceFactory;
    }

    public function handleCreateBroadwayDoctrineOrmReadEntity(CreateBroadwayDoctrineOrmReadEntity $command): array
    {
        return [
            $this->readEntitySourceFactory->create($command->getEntityClassType(), $command->getEntityParameters()),
        ];
    }
}
