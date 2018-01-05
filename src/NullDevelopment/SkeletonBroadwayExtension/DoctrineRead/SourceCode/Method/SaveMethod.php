<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\Method;

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
    private $entity;

    public function __construct(ClassName $entity)
    {
        $this->entity = $entity;
    }

    public function getVisibility(): Visibility
    {
        return new Visibility('public');
    }

    public function getName(): string
    {
        return 'save';
    }

    /** @return MethodParameter[] */
    public function getParameters(): array
    {
        return [
            new MethodParameter('entity', $this->entity),
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
        return [$this->entity];
    }

    public function isStatic(): bool
    {
        return false;
    }
}
