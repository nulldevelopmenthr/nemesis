<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\ConstructorMethod as ConstructorMethodInterface;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use Webmozart\Assert\Assert;

/**
 * @see ConstructorMethodSpec
 * @see ConstructorMethodTest
 */
class ConstructorMethod implements ConstructorMethodInterface
{
    /** @var Property[] */
    private $properties;

    public function __construct(array $properties)
    {
        Assert::allIsInstanceOf($properties, Property::class);
        $this->properties = $properties;
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return '__construct';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return $this->properties;
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
        $imports = [];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $imports[] = $property->getInstanceName();
            }
        }

        return $imports;
    }

    public function isStatic(): bool
    {
        return false;
    }
}
