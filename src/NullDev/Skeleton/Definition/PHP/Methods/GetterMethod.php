<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Methods;

use NullDev\Skeleton\Definition\PHP\Property;

/**
 * @see GetterMethodSpec
 * @see GetterMethodTest
 */
class GetterMethod implements Method
{
    /** @var string */
    private $methodName;
    /** @var Property */
    private $property;

    public function __construct(string $methodName, Property $property)
    {
        $this->methodName = $methodName;
        $this->property   = $property;
    }

    public static function create(Property $property): GetterMethod
    {
        $methodName = 'get'.ucfirst($property->getName());

        return new self($methodName, $property);
    }

    public function getProperty(): Property
    {
        return $this->property;
    }

    public function getPropertyName()
    {
        return $this->property->getName();
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
        return $this->property->hasType();
    }

    public function getMethodReturnType(): string
    {
        return $this->property->getTypeShortName();
    }
}
