<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\BroadwaySkeleton\SourceFactory\CommandSourceFactory;

/**
 * @see CreateBroadwayCommandHandlerSpec
 * @see CreateBroadwayCommandHandlerTest
 */
class CreateBroadwayCommandHandler
{
    /** @var CommandSourceFactory */
    private $commandSourceFactory;

    public function __construct(CommandSourceFactory $commandSourceFactory)
    {
        $this->commandSourceFactory = $commandSourceFactory;
    }

    public function handle(CreateBroadwayCommand $command): array
    {
        $class = $this->commandSourceFactory->create($command->getClassType(), $command->getParameters());

        return [$class];
    }
}
