<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;

/**
 * @see TraitDefinitionSpec
 * @see TraitDefinitionTest
 */
class TraitDefinition
{
    /** @var TraitName */
    private $name;
    /** @var TraitName[] */
    private $traits;
    /** @var Constant[] */
    private $constants;
    /** @var Property[] */
    private $properties;
    /** @var Method[] */
    private $methods;

    public function __construct(
        TraitName $name,
        array $traits = [],
        array $constants = [],
        array $properties = [],
        array $methods = []
    ) {
        $this->name       = $name;
        $this->traits     = $traits;
        $this->constants  = $constants;
        $this->properties = $properties;
        $this->methods    = $methods;
    }

    public function getName(): TraitName
    {
        return $this->name;
    }

    /** @return TraitName[] */
    public function getTraits(): array
    {
        return $this->traits;
    }

    /** @return Constant[] */
    public function getConstants(): array
    {
        return $this->constants;
    }

    /** @return Property[] */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /** @return Method[] */
    public function getMethods(): array
    {
        return $this->methods;
    }
}
