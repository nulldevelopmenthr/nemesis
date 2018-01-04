<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandlerSpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandlerTest
 */
class CommandHandler extends ClassDefinition implements SourceCode
{
    /** @var ClassName */
    private $model;

    /** @var ClassName */
    private $modelId;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        array $constants,
        array $properties,
        array $methods,
        ClassName $model,
        ClassName $modelId
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $constants, $properties, $methods);
        $this->model   = $model;
        $this->modelId = $modelId;
    }

    public function getModel(): ClassName
    {
        return $this->model;
    }

    public function getModelId(): ClassName
    {
        return $this->modelId;
    }
}
