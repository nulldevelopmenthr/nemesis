<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository;
use NullDev\BroadwaySkeleton\SourceFactory\Read\DoctrineOrm\ReadRepositorySourceFactory;

/**
 * @see BroadwayDoctrineOrmReadRepositoryHandlerSpec
 * @see BroadwayDoctrineOrmReadRepositoryHandlerTest
 */
class BroadwayDoctrineOrmReadRepositoryHandler
{
    /** @var ReadRepositorySourceFactory */
    private $readRepositorySourceFactory;

    public function __construct(ReadRepositorySourceFactory $readRepositorySourceFactory)
    {
        $this->readRepositorySourceFactory = $readRepositorySourceFactory;
    }

    public function handleCreateBroadwayDoctrineOrmReadRepository(CreateBroadwayDoctrineOrmReadRepository $command): array
    {
        return [
            $this->readRepositorySourceFactory->create($command->getRepositoryClassType()),
        ];
    }
}
