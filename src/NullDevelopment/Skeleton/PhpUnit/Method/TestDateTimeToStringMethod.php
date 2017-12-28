<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\Method;

/**
 * @see TestDateTimeToStringMethodSpec
 * @see TestDateTimeToStringMethodTest
 */
class TestDateTimeToStringMethod extends BaseTestMethod
{
    public function getName(): string
    {
        return 'testToString';
    }

    /** @return \NullDevelopment\PhpStructure\DataType\Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getImports(): array
    {
        return [];
    }
}
