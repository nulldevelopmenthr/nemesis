<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\Method;

/**
 * @see TestDateTimeSerializeMethodSpec
 * @see TestDateTimeSerializeMethodTest
 */
class TestDateTimeSerializeMethod extends BaseTestMethod
{
    public function getName(): string
    {
        return 'testSerialize';
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
