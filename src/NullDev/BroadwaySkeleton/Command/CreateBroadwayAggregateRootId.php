<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Command;

use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;

/**
 * @see CreateBroadwayAggregateRootIdSpec
 * @see CreateBroadwayAggregateRootIdTest
 */
class CreateBroadwayAggregateRootId
{
    /** @var RootIdClassName */
    private $rootIdClassName;

    public function __construct(RootIdClassName $rootIdClassName)
    {
        $this->rootIdClassName = $rootIdClassName;
    }

    public static function create(BoundedContextConfig $config): CreateBroadwayAggregateRootId
    {
        return new self($config->getRootIdClassName());
    }

    public function getRootIdClassName(): RootIdClassName
    {
        return $this->rootIdClassName;
    }
}
