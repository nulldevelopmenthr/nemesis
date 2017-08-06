<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;

/**
 * @see CreateBroadwayCommandHandlerSpec
 * @see CreateBroadwayCommandHandlerTest
 */
class CreateBroadwayCommandHandler
{
    /** @var CommandSourceFactory */
    private $commandSourceFactory;
    /** @var SpecGenerator */
    private $specGenerator;
    /** @var PHPUnitTestGenerator */
    private $unitTestGenerator;

    public function __construct(
        CommandSourceFactory $commandSourceFactory,
        SpecGenerator $specGenerator,
        PHPUnitTestGenerator $unitTestGenerator
    ) {
        $this->commandSourceFactory = $commandSourceFactory;
        $this->specGenerator        = $specGenerator;
        $this->unitTestGenerator    = $unitTestGenerator;
    }

    public function handle(CreateBroadwayCommand $command): array
    {
        $class = $this->commandSourceFactory->create($command->getClassType(), $command->getParameters());

        $spec = $this->specGenerator->generate($class);
        $test = $this->unitTestGenerator->generate($class);

        return [$class, $spec, $test];
    }
}
