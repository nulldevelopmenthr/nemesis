<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;

/**
 * @see CreateBroadwayAggregateRootModelSpec
 * @see CreateBroadwayAggregateRootModelTest
 */
class CreateBroadwayAggregateRootModel
{
    /** @var RootIdClassName */
    private $rootIdClassName;
    /** @var RootModelClassName */
    private $modelClassName;

    public function __construct(RootModelClassName $modelClassName, RootIdClassName $rootIdClassName)
    {
        $this->modelClassName  = $modelClassName;
        $this->rootIdClassName = $rootIdClassName;
    }

    public static function create(BoundedContextConfig $config): CreateBroadwayAggregateRootModel
    {
        return new self($config->getModelClassName(), $config->getRootIdClassName());
    }

    public function getModelClassName(): RootModelClassName
    {
        return $this->modelClassName;
    }

    public function getRootIdClassName(): RootIdClassName
    {
        return $this->rootIdClassName;
    }
}
