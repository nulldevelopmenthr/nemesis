<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Definition\PHP\Types;

/**
 * @see InterfaceTypeSpec
 * @see InterfaceTypeTest
 */
class InterfaceType extends ConceptName
{
    public static function createFromFullyQualified(string $fullName): InterfaceType
    {
        return parent::createFromFullyQualified($fullName);
    }
}
