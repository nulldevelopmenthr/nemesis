<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\ExampleMaker;

use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Reflection\Reflection;

class ReflectionFactory
{
    public static function reflect(string $fullName): Reflection
    {
        return (new BetterReflection())
            ->classReflector()
            ->reflect($fullName);
    }
}
