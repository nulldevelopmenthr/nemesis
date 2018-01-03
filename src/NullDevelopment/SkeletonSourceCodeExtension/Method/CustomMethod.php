<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Visibility;

/**
 * @see CustomMethodSpec
 * @see CustomMethodTest
 */
class CustomMethod implements Method
{
    /** @var string */
    private $name;

    /** @var Visibility */
    private $visibility;

    /** @var array */
    private $parameters;

    /** @var string */
    private $returnType;

    /** @var bool */
    private $isNullableReturnType;

    /** @var array */
    private $body;

    /** @var array */
    private $imports;

    public function __construct(
        string $name,
        array $parameters,
        array $body
    ) {
        $this->name       = $name;
        $this->parameters = $parameters;
        $this->body       = $body;

        $this->visibility           = new Visibility('public');
        $this->returnType           = 'string';
        $this->isNullableReturnType = false;
        $this->imports              = [];
    }

    public function setVisibility(Visibility $visibility)
    {
        $this->visibility = $visibility;
    }

    public function setReturnType(string $returnType)
    {
        $this->returnType = $returnType;
    }

    public function setIsNullableReturnType(bool $isNullableReturnType)
    {
        $this->isNullableReturnType = $isNullableReturnType;
    }

    public function setImports(array $imports)
    {
        $this->imports = $imports;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVisibility(): Visibility
    {
        return $this->visibility;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getReturnType(): string
    {
        return $this->returnType;
    }

    public function isNullableReturnType(): bool
    {
        return $this->isNullableReturnType;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        $imports = $this->imports;

        foreach ($this->parameters as $parameter) {
            $imports[] = $parameter->getInstanceName();
        }

        return $imports;
    }

    public function isStatic(): bool
    {
        return false;
    }
}
