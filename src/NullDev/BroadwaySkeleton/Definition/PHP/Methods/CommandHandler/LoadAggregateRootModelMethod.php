<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;

/**
 * @see LoadAggregateRootModelMethodSpec
 * @see LoadAggregateRootModelMethodTest
 */
class LoadAggregateRootModelMethod implements Method
{
    /** @var RootIdClassName */
    private $idClassName;

    /** @var RootModelClassName */
    private $modelClassName;

    public function __construct(RootIdClassName $idClassName, RootModelClassName $modelClassName)
    {
        $this->idClassName    = $idClassName;
        $this->modelClassName = $modelClassName;
    }

    public function getVisibility(): string
    {
        return 'private';
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function getMethodName(): string
    {
        return 'load';
    }

    public function getMethodParameters(): array
    {
        return [new Parameter('id', $this->idClassName)];
    }

    public function hasMethodReturnType(): bool
    {
        return true;
    }

    public function getMethodReturnType(): string
    {
        return $this->modelClassName->getName();
    }
}
