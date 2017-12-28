<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;

/**
 * @see DateTimeToStringMethodSpec
 * @see DateTimeToStringMethodTest
 */
class DateTimeToStringMethod implements Method
{
    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return '__toString';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getReturnType(): string
    {
        return 'string';
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }

    public function getImports(): array
    {
        return [];
    }

    public function isStatic(): bool
    {
        return false;
    }
}
