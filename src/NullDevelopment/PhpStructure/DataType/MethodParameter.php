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

    public function __construct(
        string $name,
        ContractName $contractName,
        bool $nullable = false,
        bool $hasDefaultValue = false,
        $defaultValue = null
    ) {
        $this->name            = $name;
        $this->contractName    = $contractName;
        $this->nullable        = $nullable;
        $this->hasDefaultValue = $hasDefaultValue;
        $this->defaultValue    = $defaultValue;
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
}
