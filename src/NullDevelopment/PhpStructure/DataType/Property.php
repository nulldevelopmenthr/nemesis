<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataTypeName\ContractName;

/**
 * @see PropertySpec
 * @see PropertyTest
 */
class Property implements Variable
{
    /** @var string */
    private $name;

    /** @var ContractName */
    private $structureName;

    /** @var bool */
    private $nullable;

    /** @var bool */
    private $hasDefaultValue;

    /** @var mixed */
    private $defaultValue;

    /** @var Visibility */
    private $visibility;

    /** @var array */
    private $examples;

    public function __construct(
        string $name,
        ContractName $structureName,
        bool $nullable,
        bool $hasDefaultValue,
        $defaultValue,
        Visibility $visibility,
        array $examples = []
    ) {
        $this->name            = $name;
        $this->structureName   = $structureName;
        $this->nullable        = $nullable;
        $this->hasDefaultValue = $hasDefaultValue;
        $this->defaultValue    = $defaultValue;
        $this->visibility      = $visibility;
        $this->examples        = $examples;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getInstanceName(): ContractName
    {
        return $this->structureName;
    }

    public function getInstanceNameAsString(): string
    {
        return $this->structureName->getName();
    }

    public function getInstanceFullName(): string
    {
        return $this->structureName->getFullName();
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function hasDefaultValue(): bool
    {
        return $this->hasDefaultValue;
    }

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    public function getVisibility(): Visibility
    {
        return $this->visibility;
    }

    public function getExamples(): array
    {
        return $this->examples;
    }

    public function isObject(): bool
    {
        if (true === in_array($this->getInstanceFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
            return false;
        }

        return true;
    }
}
