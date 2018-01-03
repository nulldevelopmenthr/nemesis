<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see UuidV4CreateMethodSpec
 * @see UuidV4CreateMethodTest
 */
class UuidV4CreateMethod implements Method
{
    public function __construct()
    {
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return 'create';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getReturnType(): string
    {
        return 'self';
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [
            ClassName::create('Ramsey\Uuid\Uuid'),
        ];
    }

    public function isStatic(): bool
    {
        return false;
    }
}
