<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcedAggregateRootSourceFactory;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourcingRepositorySourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\SourceFactory\Uuid4IdentitySourceFactory;

/**
 * @see CreateBroadwayModelHandlerSpec
 * @see CreateBroadwayModelHandlerTest
 */
class CreateBroadwayModelHandler
{
    /** @var Uuid4IdentitySourceFactory */
    private $uuid4IdentitySourceFactory;
    /** @var EventSourcedAggregateRootSourceFactory */
    private $aggregateRootSourceFactory;
    /** @var EventSourcingRepositorySourceFactory */
    private $repositorySourceFactory;
    /** @var SpecGenerator */
    private $specGenerator;
    /** @var PHPUnitTestGenerator */
    private $unitTestGenerator;

    public function __construct(
        Uuid4IdentitySourceFactory $uuid4IdentitySourceFactory,
        EventSourcedAggregateRootSourceFactory $aggregateRootSourceFactory,
        EventSourcingRepositorySourceFactory $repositorySourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->uuid4IdentitySourceFactory = $uuid4IdentitySourceFactory;
        $this->aggregateRootSourceFactory = $aggregateRootSourceFactory;
        $this->repositorySourceFactory    = $repositorySourceFactory;
        $this->specGenerator              = $specGenerator;
        $this->unitTestGenerator          = $unitTestGenerator;
    }

    public function handle(CreateBroadwayModel $command): array
    {
        $classes = [];
        $specs   = [];
        $tests   = [];

        $classes[] = $this->uuid4IdentitySourceFactory->create($command->getModelIdType());
        $classes[] = $this->aggregateRootSourceFactory->create($command->getModelType(), $command->getModelIdAsParameter());
        $classes[] = $this->repositorySourceFactory->create($command->getRepositoryType(), $command->getModelType());

        foreach ($classes as $class) {
            $specs[] = $this->specGenerator->generate($class);
            $tests[] = $this->unitTestGenerator->generate($class);
        }

        return array_merge($classes, $specs, $tests);
    }
}
