<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

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

    public static function create(Property $property): self
    {
        if ('bool' === $property->getInstanceNameAsString()) {
            $methodName = 'is'.ucfirst($property->getName());
        } else {
            $methodName = 'get'.ucfirst($property->getName());
        }

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

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        $imports = [];
        if (true === $this->property->isObject()) {
            $imports[] = $this->property->getInstanceName();
        }

        return $imports;
    }

    public function isStatic(): bool
    {
        return false;
    }
}
