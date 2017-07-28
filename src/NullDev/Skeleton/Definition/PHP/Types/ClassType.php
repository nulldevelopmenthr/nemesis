<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Types;

/**
 * @see ClassTypeSpec
 * @see ClassTypeTest
 */
class ClassType extends ConceptName
{
    public static function createFromFullyQualified(string $fullName): ClassType
    {
        return parent::createFromFullyQualified($fullName);
    }
}
