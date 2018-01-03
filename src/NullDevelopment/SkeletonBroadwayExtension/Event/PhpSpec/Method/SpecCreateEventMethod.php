<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpSpecExtension\Method\BaseSpecMethod;

/**
 * @see SpecCreateEventMethodSpec
 * @see SpecCreateEventMethodTest
 */
class SpecCreateEventMethod extends BaseSpecMethod
{
    /** @var ClassName */
    private $className;

    /** @var array|Property[] */
    private $properties;

    /** @param Property[] $properties */
    public function __construct(ClassName $className, array $properties)
    {
        $this->className  = $className;
        $this->properties = $properties;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getName(): string
    {
        return 'it_has_a_helper_factory_method';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return $this->properties;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }
}
