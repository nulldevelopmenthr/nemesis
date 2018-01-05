<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\Definition;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode;

/**
 * @see SimpleCollectionSpec
 * @see SimpleCollectionTest
 */
class SimpleCollection extends ClassDefinition implements SourceCode
{
    /** @var CollectionOf */
    private $collectionOf;

    /** @var bool */
    private $serializationEnabled;

    /** @SuppressWarnings(PHPMD.ExcessiveParameterList) */
    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        array $constants,
        array $properties,
        array $methods,
        CollectionOf $collectionOf,
        bool $serializationEnabled
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $constants, $properties, $methods);
        $this->collectionOf         = $collectionOf;
        $this->serializationEnabled = $serializationEnabled;
    }

    public function getCollectionOf(): CollectionOf
    {
        return $this->collectionOf;
    }

    public function isSerializationEnabled(): bool
    {
        return $this->serializationEnabled;
    }
}
