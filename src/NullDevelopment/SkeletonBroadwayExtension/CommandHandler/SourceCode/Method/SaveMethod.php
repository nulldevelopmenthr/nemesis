<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see SaveMethodSpec
 * @see SaveMethodTest
 */
class SaveMethod implements Method
{
    /** @var ClassName */
    private $model;

    public function __construct(ClassName $model)
    {
        $this->model = $model;
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('protected');
    }

    public function getName(): string
    {
        return 'save';
    }

    /** @return MethodParameter[] */
    public function getParameters(): array
    {
        return [
            new MethodParameter('model', $this->model),
        ];
    }

    public function getReturnType(): string
    {
        return '';
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [$this->model];
    }

    public function isStatic(): bool
    {
        return false;
    }
}
