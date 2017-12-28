<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see SpecDateTimeLetMethodSpec
 * @see SpecDateTimeLetMethodTest
 */
class SpecDateTimeLetMethod extends BaseSpecMethod
{
    public function getName(): string
    {
        return 'let';
    }

    /** @return Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getImports(): array
    {
        return [];
    }
}
