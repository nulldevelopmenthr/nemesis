<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;

/**
 * @see CreateBroadwayAggregateRootRepositorySpec
 * @see CreateBroadwayAggregateRootRepositoryTest
 */
class CreateBroadwayAggregateRootRepository
{
    /** @var RootRepositoryClassName */
    private $repositoryClassName;
    /** @var RootModelClassName */
    private $modelClassName;

    public function __construct(
        RootRepositoryClassName $repositoryClassName,
        RootModelClassName $modelClassName
    ) {
        $this->repositoryClassName = $repositoryClassName;
        $this->modelClassName      = $modelClassName;
    }

    public static function create(BoundedContextConfig $config): CreateBroadwayAggregateRootRepository
    {
        return new self($config->getRepositoryClassName(), $config->getModelClassName());
    }

    public function getRepositoryClassName(): RootRepositoryClassName
    {
        return $this->repositoryClassName;
    }

    public function getModelClassName(): RootModelClassName
    {
        return $this->modelClassName;
    }
}
