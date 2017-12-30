<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see DateTimeDeserializeMethodSpec
 * @see DateTimeDeserializeMethodTest
 */
class DateTimeDeserializeMethod implements Method
{
    /** @var ClassName */
    private $className;

    public function __construct(ClassName $className)
    {
        $this->className = $className;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return 'deserialize';
    }

    /** @return MethodParameter[] */
    public function getParameters(): array
    {
        return [
            new MethodParameter('value', new ClassName('', ''), false, false, null),
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
