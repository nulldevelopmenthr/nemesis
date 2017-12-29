<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataTypeName\ContractName;

/**
 * @see MethodParameterSpec
 * @see MethodParameterTest
 */
class MethodParameter implements Variable
{
    /** @var string */
    private $name;
    /** @var ContractName */
    private $contractName;
    /** @var bool */
    private $nullable;
    /** @var bool */
    private $hasDefaultValue;
    /** @var mixed */
    private $defaultValue;
    /** @var array */
    private $examples;

    public function __construct(
        string $name,
        ContractName $contractName,
        bool $nullable = false,
        bool $hasDefaultValue = false,
        $defaultValue = null,
        array $examples = []
    ) {
        $this->name            = $name;
        $this->contractName    = $contractName;
        $this->nullable        = $nullable;
        $this->hasDefaultValue = $hasDefaultValue;
        $this->defaultValue    = $defaultValue;
        $this->examples        = $examples;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getInstanceName(): ContractName
    {
        return $this->contractName;
    }

    public function getInstanceFullName(): string
    {
        return $this->contractName->getFullName();
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
