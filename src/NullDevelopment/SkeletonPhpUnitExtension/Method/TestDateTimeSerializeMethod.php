<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\Method;

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

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }
}
