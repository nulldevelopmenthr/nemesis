<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see SpecSerializeMethodSpec
 * @see SpecSerializeMethodTest
 */
class SpecSerializeMethod extends BaseSpecMethod
{
    /** @var array|Property[] */
    private $properties;

    /** @param array|Property[] $properties */
    public function __construct(array $properties)
    {
        $this->properties = $properties;
    }

    /** @return Property[] */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function getName(): string
    {
        return 'it_can_be_serialized';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        $parameters = [];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $parameters[] = $property;
            }
        }

        return $parameters;
    }

    public function getImports(): array
    {
        $imports = [];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $imports[] = $property->getInstanceFullName();
            }
        }

        return $imports;
    }
}
