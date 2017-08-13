<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Types;

use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;

/**
 * @see TypeFactorySpec
 * @see TypeFactoryTest
 */
class TypeFactory
{
    public static function create(?string $typeName = null): ?Type
    {
        if (null === $typeName) {
            $type = null;
        } elseif ('' === $typeName) {
            $type = null;
        } elseif ('string' === $typeName) {
            $type = new StringType();
        } elseif ('int' === $typeName) {
            $type = new IntType();
        } elseif ('float' === $typeName) {
            $type = new FloatType();
        } elseif ('array' === $typeName) {
            $type = new ArrayType();
        } elseif ('bool' === $typeName) {
            $type = new BoolType();
        } else {
            $type = ClassType::createFromFullyQualified($typeName);
        }

        return $type;
    }

    public static function isTypeDeclaration(?string $typeName = null): bool
    {
        if (null === $typeName || '' === $typeName) {
            return false;
        }

        return in_array($typeName, ['string', 'int', 'float', 'array', 'bool']);
    }
}
