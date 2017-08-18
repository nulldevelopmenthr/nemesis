<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommandHandler;
use NullDev\BroadwaySkeleton\SourceFactory\CommandHandlerSourceFactory;

/**
 * @see BroadwayCommandHandlerHandlerSpec
 * @see BroadwayCommandHandlerHandlerTest
 */
class BroadwayCommandHandlerHandler
{
    /**
     * @var CommandHandlerSourceFactory
     */
    private $commandHandlerSourceFactory;

    public function __construct(CommandHandlerSourceFactory $commandHandlerSourceFactory)
    {
        $this->commandHandlerSourceFactory = $commandHandlerSourceFactory;
    }

    public function handleCreateBroadwayCommandHandler(CreateBroadwayCommandHandler $command)
    {
        $classes = [
            $this->commandHandlerSourceFactory->create(
                $command->getHandlerClassName(),
                $command->getRepositoryClassName(),
                $command->getIdClassName(),
                $command->getModelClassName()
            ),
        ];

        return $classes;
    }
}
