<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;

/**
 * @see CreateBroadwayModelSpec
 * @see CreateBroadwayModelTest
 */
class CreateBroadwayModel
{
    /** @var RootIdClassName */
    private $rootIdClassName;
    /** @var RootModelClassName */
    private $modelClassName;
    /** @var RootRepositoryClassName */
    private $repositoryClassName;
    /** @var CommandHandlerClassName */
    private $commandHandlerClassName;

    public function __construct(
        RootIdClassName $rootIdClassName,
        RootModelClassName $modelClassName,
        RootRepositoryClassName $repositoryClassName,
        CommandHandlerClassName $commandHandlerClassName
    ) {
        $this->rootIdClassName         = $rootIdClassName;
        $this->modelClassName          = $modelClassName;
        $this->repositoryClassName     = $repositoryClassName;
        $this->commandHandlerClassName = $commandHandlerClassName;
    }

    public function getRootIdClassName(): RootIdClassName
    {
        return $this->rootIdClassName;
    }

    public function getModelClassName(): RootModelClassName
    {
        return $this->modelClassName;
    }

    public function getRepositoryClassName(): RootRepositoryClassName
    {
        return $this->repositoryClassName;
    }

    public function getCommandHandlerClassName(): CommandHandlerClassName
    {
        return $this->commandHandlerClassName;
    }

    public function getRootIdAsParameter(): Parameter
    {
        return new Parameter(lcfirst($this->rootIdClassName->getName()), $this->rootIdClassName);
    }
}
