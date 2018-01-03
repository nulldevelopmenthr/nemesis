<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Variable;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see DateTimeCreateFromFormatMethodSpec
 * @see DateTimeCreateFromFormatMethodTest
 */
class DateTimeCreateFromFormatMethod implements Method
{
    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return 'createFromFormat';
    }

    /** @return Variable[] */
    public function getParameters(): array
    {
        return [
            new MethodParameter('format', new ClassName('', ''), false, false, null),
            new MethodParameter('time', new ClassName('', ''), false, false, null),
            new MethodParameter('object', new ClassName('', ''), false, true, null),
        ];
    }

    public function getReturnType(): string
    {
        return 'self';
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [];
    }

    public function isStatic(): bool
    {
        return true;
    }
}
