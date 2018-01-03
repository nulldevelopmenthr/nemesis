<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Variable;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use Webmozart\Assert\Assert;

/**
 * @see DeserializeMethodSpec
 * @see DeserializeMethodTest
 */
class DeserializeMethod implements Method
{
    /** @var ClassName */
    private $className;

    /** @var array|Property[] */
    private $properties;

    /** @param array|Property[] $properties */
    public function __construct(ClassName $className, array $properties)
    {
        Assert::allIsInstanceOf($properties, Property::class);
        $this->className  = $className;
        $this->properties = $properties;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    /** @return Property[] */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return 'deserialize';
    }

    /** @return Variable[] */
    public function getParameters(): array
    {
        if (0 === count($this->properties)) {
            return [new MethodParameter('data', ClassName::create('array'), false, false, null)];
        } elseif (count($this->properties) > 1) {
            return [new MethodParameter('data', ClassName::create('array'), false, false, null)];
        }

        return $this->properties;
    }

    public function getReturnType(): string
    {
        return 'self';
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        $imports = [
            $this->className,
        ];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $imports[] = $property->getInstanceName();
            }
        }

        return $imports;
    }

    public function isStatic(): bool
    {
        return true;
    }
}
