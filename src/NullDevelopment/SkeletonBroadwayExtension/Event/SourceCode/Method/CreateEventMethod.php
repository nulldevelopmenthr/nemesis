<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see CreateEventMethodSpec
 * @see CreateEventMethodTest
 */
class CreateEventMethod implements Method
{
    /** @var ClassName */
    private $className;

    /** @var array|Property[] */
    private $properties;

    private $isLastPropertyTimeStamp;

    /** @param Property[] $properties */
    public function __construct(ClassName $className, array $properties)
    {
        $this->className  = $className;
        $this->properties = $properties;

        if ('DateTime' === end($properties)->getInstanceFullName()) {
            $this->isLastPropertyTimeStamp = true;
        } else {
            $this->isLastPropertyTimeStamp = false;
        }
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function isLastPropertyTimeStamp(): bool
    {
        return $this->isLastPropertyTimeStamp;
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return 'create';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        if (false === $this->isLastPropertyTimeStamp) {
            return $this->properties;
        }

        return array_slice($this->properties, 0, -1, true);
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
        $imports = [];
        if (true === $this->isLastPropertyTimeStamp) {
            $imports[] = ClassName::create('Carbon\Carbon');
        }

        return $imports;
    }

    public function isStatic(): bool
    {
        return false;
    }
}
