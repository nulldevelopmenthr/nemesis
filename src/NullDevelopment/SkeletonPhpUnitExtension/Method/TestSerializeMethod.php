<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see TestSerializeMethodSpec
 * @see TestSerializeMethodTest
 */
class TestSerializeMethod extends BaseTestMethod
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
        return 'testSerialize';
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

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        $imports = [];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $imports[] = $property->getInstanceName();
            }
        }

        return $imports;
    }
}
