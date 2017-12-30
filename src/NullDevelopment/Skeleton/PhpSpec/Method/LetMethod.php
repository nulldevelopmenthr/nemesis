<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use Webmozart\Assert\Assert;

/**
 * @see LetMethodSpec
 * @see LetMethodTest
 */
class LetMethod extends BaseSpecMethod
{
    /** @var Property[] */
    private $properties;

    public function __construct(array $properties)
    {
        Assert::allIsInstanceOf($properties, Property::class);
        $this->properties = $properties;
    }

    public function getName(): string
    {
        return 'let';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return $this->properties;
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
