<?php

declare(strict_types=1);

namespace NullDev\Skeleton\Source;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;

/**
 * @see ClassSourceFactorySpec
 * @see ClassSourceFactoryTest
 */
class ClassSourceFactory
{
    public function create(ClassType $classType): ImprovedClassSource
    {
        return new ImprovedClassSource($classType);
    }
}
