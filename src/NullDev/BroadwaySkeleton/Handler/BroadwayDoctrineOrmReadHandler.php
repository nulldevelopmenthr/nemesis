<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadEntitySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadFactorySourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadProjectorSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadRepositorySourceFactory;

/**
 * @see CreateBroadwayDoctrineOrmReadHandlerSpec
 * @see CreateBroadwayDoctrineOrmReadHandlerTest
 */
class CreateBroadwayDoctrineOrmReadHandler
{
    /** @var ReadEntitySourceFactory */
    private $readEntitySourceFactory;
    /** @var ReadRepositorySourceFactory */
    private $readRepositorySourceFactory;
    /** @var ReadFactorySourceFactory */
    private $readFactorySourceFactory;
    /** @var ReadProjectorSourceFactory */
    private $readProjectorSourceFactory;

    public function __construct(
        ReadEntitySourceFactory $readEntitySourceFactory,
        ReadRepositorySourceFactory $readRepositorySourceFactory,
        ReadFactorySourceFactory $readFactorySourceFactory,
        ReadProjectorSourceFactory $readProjectorSourceFactory
    ) {
        $this->readEntitySourceFactory     = $readEntitySourceFactory;
        $this->readRepositorySourceFactory = $readRepositorySourceFactory;
        $this->readFactorySourceFactory    = $readFactorySourceFactory;
        $this->readProjectorSourceFactory  = $readProjectorSourceFactory;
    }

    public function handleCreateBroadwayDoctrineOrmRead(CreateBroadwayDoctrineOrmRead $command): array
    {
        $classes = [
            $this->readEntitySourceFactory->create($command->getEntityClassType(), $command->getEntityParameters()),
            $this->readRepositorySourceFactory->create($command->getRepositoryClassType()),
            $this->readFactorySourceFactory->create($command->getFactoryClassType()),
            $this->readProjectorSourceFactory->create($command->getProjectorClassType(), $command->getEntityParameters()),
        ];

        return $classes;
    }
}
