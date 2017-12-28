<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\Method;

/**
 * @see TestDateTimeCreateFromFormatMethodSpec
 * @see TestDateTimeCreateFromFormatMethodTest
 */
class TestDateTimeCreateFromFormatMethod extends BaseTestMethod
{
    public function getName(): string
    {
        return 'testCreateFromFormat';
    }

    /** @return \NullDevelopment\PhpStructure\DataType\Property[] */
    public function getParameters(): array
    {
        return [];
    }

    public function getImports(): array
    {
        return ['DateTime'];
    }
}
