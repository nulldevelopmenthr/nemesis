<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use Roave\BetterReflection\BetterReflection;
use Webmozart\Assert\Assert;

/**
 * @see SerializeMethodSpec
 * @see SerializeMethodTest
 */
class SerializeMethod implements Method
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
        return 'serialize';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getReturnType(): string
    {
        if (0 === count($this->properties)) {
            return 'array';
        } elseif (count($this->properties) > 1) {
            return 'array';
        } else {
            $property = $this->properties[0];

            if (true === $property->isObject()) {
                $refl = (new BetterReflection())
                    ->classReflector()
                    ->reflect($property->getInstanceFullName());

                if (count($refl->getConstructor()->getParameters()) > 1) {
                    return 'array';
                }

                return $refl->getConstructor()->getParameters()[0]->getType()->__toString();
            } else {
                return $property->getInstanceFullName();
            }
        }
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }

    public function getImports(): array
    {
        $imports = [
            $this->className->getFullName(),
        ];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $imports[] = $property->getInstanceFullName();
            }
        }

        return $imports;
    }

    public function isStatic(): bool
    {
        return false;
    }
}
