<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;

/**
 * @see GetterMethodSpec
 * @see GetterMethodTest
 */
class GetterMethod implements Method
{
    /** @var string */
    private $name;
    /** @var Property */
    private $property;

    public function __construct(string $name, Property $property)
    {
        $this->name     = $name;
        $this->property = $property;
    }

    public function getProperty(): Property
    {
        return $this->property;
    }

    public function getPropertyName(): string
    {
        return $this->property->getName();
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return $this->name;
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getReturnType(): string
    {
        return $this->property->getInstanceFullName();
    }

    public function isNullableReturnType(): bool
    {
        return $this->property->isNullable();
    }

    public function getImports(): array
    {
        return [];
    }

    public function isStatic(): bool
    {
        return false;
    }
}
