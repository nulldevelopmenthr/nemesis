<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\BroadwaySkeleton\SourceFactory\EventSourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;

/**
 * @see CreateBroadwayEventHandlerSpec
 * @see CreateBroadwayEventHandlerTest
 */
class CreateBroadwayEventHandler
{
    /** @var EventSourceFactory */
    private $eventSourceFactory;
    /** @var SpecGenerator */
    private $specGenerator;
    /** @var PHPUnitTestGenerator */
    private $unitTestGenerator;

    public function __construct(
        EventSourceFactory $eventSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->eventSourceFactory   = $eventSourceFactory;
        $this->specGenerator        = $specGenerator;
        $this->unitTestGenerator    = $unitTestGenerator;
    }

    public function handle(CreateBroadwayEvent $command): array
    {
        $class = $this->eventSourceFactory->create($command->getClassType(), $command->getParameters());

        $spec = $this->specGenerator->generate($class);
        $test = $this->unitTestGenerator->generate($class);

        return [$class, $spec, $test];
    }
}
