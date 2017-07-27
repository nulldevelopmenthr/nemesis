<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

/**
 * @see FloatTypeSpec
 * @see FloatTypeTest
 */
class FloatType implements TypeDeclaration
{
    public function getName(): string
    {
        return 'float';
    }

    public function getFullName(): string
    {
        return 'float';
    }
}
