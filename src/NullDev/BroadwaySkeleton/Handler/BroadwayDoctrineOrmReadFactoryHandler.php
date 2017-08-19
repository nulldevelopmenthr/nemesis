<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory;

/**
 * @see BroadwayDoctrineOrmReadFactoryHandlerSpec
 * @see BroadwayDoctrineOrmReadFactoryHandlerTest
 */
class BroadwayDoctrineOrmReadFactoryHandler
{
    /** @var ReadFactorySourceFactory */
    private $readFactorySourceFactory;

    public function __construct(ReadFactorySourceFactory $readFactorySourceFactory)
    {
        $this->readFactorySourceFactory    = $readFactorySourceFactory;
    }

    public function handleCreateBroadwayDoctrineOrmReadFactory(CreateBroadwayDoctrineOrmReadFactory $command): array
    {
        return [
            $this->readFactorySourceFactory->create($command->getFactoryClassType()),
        ];
    }
}
