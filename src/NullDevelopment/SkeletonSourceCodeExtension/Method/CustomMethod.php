<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

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

    /** @var ClassName */
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
        $this->returnType           = ClassName::create('string');
        $this->isNullableReturnType = false;
        $this->imports              = [];
    }

    public function setVisibility(Visibility $visibility)
    {
        $this->visibility = $visibility;
    }

    public function setReturnType(ClassName $returnType)
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
        return $this->returnType->getFullName();
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
            if (true === $parameter->isObject()) {
                $imports[] = $parameter->getInstanceName();
            }
        }

        if (true === $this->returnType->isObject()) {
            $imports[] = $this->returnType;
        }

        return $imports;
    }

    public function isStatic(): bool
    {
        return false;
    }
}
