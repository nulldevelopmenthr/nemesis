<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see LoadMethodSpec
 * @see LoadMethodTest
 */
class LoadMethod implements Method
{
    /** @var ClassName */
    private $model;

    /** @var ClassName */
    private $modelId;

    public function __construct(ClassName $model, ClassName $modelId)
    {
        $this->model   = $model;
        $this->modelId = $modelId;
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('protected');
    }

    public function getName(): string
    {
        return 'load';
    }

    /** @return MethodParameter[] */
    public function getParameters(): array
    {
        return [
            new MethodParameter('id', $this->modelId),
        ];
    }

    public function getReturnType(): string
    {
        return $this->model->getFullName();
    }

    public function isNullableReturnType(): bool
    {
        return false;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        return [$this->model, $this->modelId];
    }

    public function isStatic(): bool
    {
        return false;
    }
}
