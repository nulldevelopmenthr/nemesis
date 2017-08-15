<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Handler;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayHandler;
use NullDev\BroadwaySkeleton\SourceFactory\CommandHandlerSourceFactory;

/**
 * @see CreateBroadwayHandlerHandlerSpec
 * @see CreateBroadwayHandlerHandlerTest
 */
class CreateBroadwayHandlerHandler
{
    /**
     * @var CommandHandlerSourceFactory
     */
    private $commandHandlerSourceFactory;

    public function __construct(CommandHandlerSourceFactory $commandHandlerSourceFactory)
    {
        $this->commandHandlerSourceFactory = $commandHandlerSourceFactory;
    }

    public function handle(CreateBroadwayHandler $command)
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
