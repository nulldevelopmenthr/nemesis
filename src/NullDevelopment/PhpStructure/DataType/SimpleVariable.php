<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataTypeName\ContractName;

/**
 * @see MethodParameterSpec
 * @see MethodParameterTest
 */
class SimpleVariable implements Variable
{
    /** @var string */
    private $name;

    /** @var ContractName */
    private $contractName;

    public function __construct(string $name, ContractName $contractName)
    {
        $this->name         = $name;
        $this->contractName = $contractName;
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

    public function getExamples(): array
    {
        return [];
    }
}
