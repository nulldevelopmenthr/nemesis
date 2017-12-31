<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;

/**
 * @see SpecDateTimeSerializeMethodSpec
 * @see SpecDateTimeSerializeMethodTest
 */
class SpecDateTimeSerializeMethod extends BaseSpecMethod
{
    public function getName(): string
    {
        return 'it_can_be_serialized';
    }

    /** @return Property[] */
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
