<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Source\ImprovedClassSource;

class DeserializeMethod implements Method
{
    private $classSource;

    public function __construct(ImprovedClassSource $classSource)
    {
        $this->classSource = $classSource;
    }

    public function getProperties(): array
    {
        return $this->classSource->getProperties();
    }

    public function getVisibility(): string
    {
        return 'public';
    }

    public function isStatic(): bool
    {
        return true;
    }

    public function getMethodName(): string
    {
        return 'deserialize';
    }

    public function getMethodParameters(): array
    {
        return [Parameter::create('data', 'array')];
    }

    public function hasMethodReturnType(): bool
    {
        return true;
    }

    public function getMethodReturnType(): string
    {
        return $this->classSource->getName();
    }
}
