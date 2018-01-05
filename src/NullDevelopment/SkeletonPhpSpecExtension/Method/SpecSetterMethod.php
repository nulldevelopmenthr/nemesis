<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see SpecSetterMethodSpec
 * @see SpecSetterMethodTest
 */
class SpecSetterMethod extends BaseSpecMethod
{
    /** @var string */
    private $name;

    /** @var string */
    private $methodUnderTest;

    /** @var Property */
    private $property;

    /** @var string */
    private $getterMethodName;

    public function __construct(string $name, string $methodUnderTest, Property $property, string $getterMethodName)
    {
        $this->name             = $name;
        $this->methodUnderTest  = $methodUnderTest;
        $this->property         = $property;
        $this->getterMethodName = $getterMethodName;
    }

    public function getMethodUnderTest(): string
    {
        return $this->methodUnderTest;
    }

    public function getProperty(): Property
    {
        return $this->property;
    }

    public function getPropertyName(): string
    {
        return $this->property->getName();
    }

    public function getGetterMethodName(): string
    {
        return $this->getterMethodName;
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

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }
}
