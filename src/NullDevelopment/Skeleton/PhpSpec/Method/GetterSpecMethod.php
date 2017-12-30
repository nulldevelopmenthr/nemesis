<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see GetterSpecMethodSpec
 * @see GetterSpecMethodTest
 */
class GetterSpecMethod extends BaseSpecMethod
{
    /** @var string */
    private $name;

    /** @var string */
    private $methodUnderTest;

    /** @var Property */
    private $property;

    public function __construct(string $name, string $methodUnderTest, Property $property)
    {
        $this->name            = $name;
        $this->methodUnderTest = $methodUnderTest;
        $this->property        = $property;
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

    public function getName(): string
    {
        return $this->name;
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [$this->property];
    }

    public function getImports(): array
    {
        return [];
    }
}
