<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;

/**
 * @see SetterMethodSpec
 * @see SetterMethodTest
 */
class SetterMethod implements Method
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

    public static function create(Property $property): self
    {
        $methodName = 'set'.ucfirst($property->getName());

        return new self($methodName, $property);
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
        return [$this->property];
    }

    public function getReturnType(): string
    {
        return '';
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }

    public function isStatic(): bool
    {
        return false;
    }
}
