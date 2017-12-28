<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see TestToStringMethodSpec
 * @see TestToStringMethodTest
 */
class TestToStringMethod extends BaseTestMethod
{
    /** @var Property */
    private $property;

    public function __construct(Property $property)
    {
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

    public function getName(): string
    {
        return 'testToString';
    }

    /** @return \NullDevelopment\PhpStructure\DataType\Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getImports(): array
    {
        return [];
    }
}
