<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Parameter;

/**
 * @see GetterMethodSpec
 * @see GetterMethodTest
 */
class GetterMethod implements Method
{
    /** @var string */
    private $methodName;
    /** @var Parameter */
    private $parameter;

    public function __construct(string $methodName, Parameter $parameter)
    {
        $this->methodName = $methodName;
        $this->parameter  = $parameter;
    }

    public static function create(Parameter $parameter): GetterMethod
    {
        $methodName = 'get'.ucfirst($parameter->getName());

        return new self($methodName, $parameter);
    }

    public function getParameter(): Parameter
    {
        return $this->parameter;
    }

    public function getPropertyName()
    {
        return $this->parameter->getName();
    }

    public function getVisibility(): string
    {
        return 'public';
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function getMethodName(): string
    {
        return $this->methodName;
    }

    public function getMethodParameters(): array
    {
        return [];
    }

    public function hasMethodReturnType(): bool
    {
        return $this->parameter->hasType();
    }

    public function getMethodReturnType(): string
    {
        return $this->parameter->getTypeShortName();
    }
}
