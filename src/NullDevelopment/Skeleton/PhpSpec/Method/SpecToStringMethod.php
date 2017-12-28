<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see SpecToStringMethodSpec
 * @see SpecToStringMethodTest
 */
class SpecToStringMethod extends BaseSpecMethod
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
        return 'it_is_castable_to_string';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getImports(): array
    {
        return [];
    }
}
