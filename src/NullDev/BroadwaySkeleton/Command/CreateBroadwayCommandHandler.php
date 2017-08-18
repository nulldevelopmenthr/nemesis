<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;

/**
 * @see CreateBroadwayCommandHandlerSpec
 * @see CreateBroadwayCommandHandlerTest
 */
class CreateBroadwayCommandHandler
{
    /** @var CommandHandlerClassName */
    private $handlerClassName;
    /** @var RootRepositoryClassName */
    private $repositoryClassName;
    /** @var RootIdClassName */
    private $idClassName;
    /** @var RootModelClassName */
    private $modelClassName;

    public function __construct(
        CommandHandlerClassName $handlerClassName,
        RootRepositoryClassName $repositoryClassName,
        RootIdClassName $idClassName,
        RootModelClassName $modelClassName
    ) {
        $this->handlerClassName    = $handlerClassName;
        $this->repositoryClassName = $repositoryClassName;
        $this->idClassName         = $idClassName;
        $this->modelClassName      = $modelClassName;
    }

    public function getHandlerClassName(): CommandHandlerClassName
    {
        return $this->handlerClassName;
    }

    public function getRepositoryClassName(): RootRepositoryClassName
    {
        return $this->repositoryClassName;
    }

    public function getIdClassName(): RootIdClassName
    {
        return $this->idClassName;
    }

    public function getModelClassName(): RootModelClassName
    {
        return $this->modelClassName;
    }
}
