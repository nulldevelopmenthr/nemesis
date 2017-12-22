<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\Type;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\SourceCode;

/**
 * @see TraitDefinitionSpec
 * @see TraitDefinitionTest
 */
class TraitDefinition implements SourceCode
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

    public function getNamespace(): ?string
    {
        return $this->name->getNamespace();
    }

    /**
     * @TODO: this name is totally WRONG!
     */
    public function getClassName(): string
    {
        return $this->name->getName();
    }

    public function getFullName(): string
    {
        return $this->name->getFullName();
    }

    public function hasTraits(): bool
    {
        if (true === empty($this->traits)) {
            return false;
        }

        return true;
    }

    /** @return TraitName[] */
    public function getTraits(): array
    {
        return $this->traits;
    }

    public function hasConstants(): bool
    {
        if (true === empty($this->constants)) {
            return false;
        }

        return true;
    }

    /** @return Constant[] */
    public function getConstants(): array
    {
        return $this->constants;
    }

    public function hasProperties(): bool
    {
        if (true === empty($this->properties)) {
            return false;
        }

        return true;
    }

    /** @return Property[] */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function hasMethods(): bool
    {
        if (true === empty($this->methods)) {
            return false;
        }

        return true;
    }

    /** @return Method[] */
    public function getMethods(): array
    {
        return $this->methods;
    }

    public function getGenerationPriority(): int
    {
        return 20;
    }
}
