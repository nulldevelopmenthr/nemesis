<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Definition\PHP\Methods\CommandHandler;

use Exception;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;

/**
 * @see SaveAggregateRootModelMethodSpec
 * @see SaveAggregateRootModelMethodTest
 */
class SaveAggregateRootModelMethod implements Method
{
    /** @var RootModelClassName */
    private $modelClassName;

    public function __construct(RootModelClassName $modelClassName)
    {
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
        return 'save';
    }

    public function getMethodParameters(): array
    {
        return [new Parameter('model', $this->modelClassName)];
    }

    public function hasMethodReturnType(): bool
    {
        return false;
    }

    public function getMethodReturnType(): string
    {
        throw new Exception('Err 235235256: Method return type not supported on save.');
    }
}
