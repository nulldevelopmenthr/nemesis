<?php

declare(strict_types=1);

namespace NullDev\Theater\Naming;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see EventClassNameSpec
 * @see EventClassNameTest
 */
class EventClassName extends ClassType
{
    public static function create(string $fullName): self
    {
        return parent::createFromFullyQualified($fullName);
    }
}
