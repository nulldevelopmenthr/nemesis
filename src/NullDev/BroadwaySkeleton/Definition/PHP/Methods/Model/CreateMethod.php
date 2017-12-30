<?php

declare(strict_types=1);

namespace NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model;

use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Webmozart\Assert\Assert;

class CreateMethod implements Method
{
    private $classToBuild;

    /** @var Parameter[]|array */
    private $params;

    public function __construct(ClassType $classToBuild, array $params)
    {
        Assert::allIsInstanceOf($params, Parameter::class);

        $this->classToBuild = $classToBuild;
        $this->params       = $params;
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
        return 'create';
    }

    /** @return Parameter[]|array */
    public function getMethodParameters(): array
    {
        return $this->params;
    }

    public function hasMethodReturnType(): bool
    {
        return true;
    }

    public function getMethodReturnType(): string
    {
        return $this->classToBuild->getName();
    }
}
