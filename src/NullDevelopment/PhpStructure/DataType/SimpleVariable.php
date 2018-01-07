<?php

declare(strict_types=1);

namespace NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
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

    public static function int(string $name): self
    {
        return new self($name, ClassName::create('int'));
    }

    public static function string(string $name): self
    {
        return new self($name, ClassName::create('string'));
    }

    public static function float(string $name): self
    {
        return new self($name, ClassName::create('float'));
    }

    public static function bool(string $name): self
    {
        return new self($name, ClassName::create('bool'));
    }

    public static function array(string $name): self
    {
        return new self($name, ClassName::create('array'));
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
