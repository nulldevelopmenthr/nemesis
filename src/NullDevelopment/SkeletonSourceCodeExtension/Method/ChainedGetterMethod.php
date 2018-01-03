<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;

/**
 * @see ChainedGetterMethodSpec
 * @see ChainedGetterMethodTest
 */
class ChainedGetterMethod implements Method
{
    /** @var string */
    private $name;

    /** @var GetterMethod */
    private $getterMethod;

    public function __construct(string $name, GetterMethod $getterMethod)
    {
        $this->name         = $name;
        $this->getterMethod = $getterMethod;
    }

    public function getGetterMethod(): GetterMethod
    {
        return $this->getterMethod;
    }

    public function getPropertyName(): string
    {
        return $this->getterMethod->getPropertyName();
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return $this->name;
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getReturnType(): string
    {
        return $this->getterMethod->getReturnType();
    }

    public function isNullableReturnType(): bool
    {
        return $this->getterMethod->isNullableReturnType();
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }

    public function isStatic(): bool
    {
        return false;
    }
}
