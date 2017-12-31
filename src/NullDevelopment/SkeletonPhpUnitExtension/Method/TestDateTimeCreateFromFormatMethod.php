<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\Method;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;

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

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [ClassName::create('DateTime')];
    }
}
