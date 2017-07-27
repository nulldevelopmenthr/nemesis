<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

/**
 * @see ArrayTypeSpec
 * @see ArrayTypeTest
 */
class ArrayType implements TypeDeclaration
{
    public function getName(): string
    {
        return 'array';
    }

    public function getFullName(): string
    {
        return 'array';
    }
}
