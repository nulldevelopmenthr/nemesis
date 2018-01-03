<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode;

/**
 * @see \spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepositorySpec
 * @see \Tests\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepositoryTest
 */
class EventSourcingRepository extends ClassDefinition implements SourceCode
{
    /**
     * @var ClassName
     */
    private $entity;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        array $constants,
        array $properties,
        array $methods,
        ClassName $entity
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $constants, $properties, $methods);
        $this->entity = $entity;
    }

    public function getEntity(): ClassName
    {
        return $this->entity;
    }
}
