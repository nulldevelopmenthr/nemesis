<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration;

/**
 * @see StringTypeSpec
 * @see StringTypeTest
 */
class StringType implements TypeDeclaration
{
    public function getName(): string
    {
        return 'string';
    }

    public function getFullName(): string
    {
        return 'string';
    }
}
