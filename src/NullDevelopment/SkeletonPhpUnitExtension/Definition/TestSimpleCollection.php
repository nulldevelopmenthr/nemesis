<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpUnitExtension\Definition;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;

/**
 * @see TestSimpleCollectionSpec
 * @see TestSimpleCollectionTest
 */
class TestSimpleCollection extends BaseTestClassDefinition
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
        ClassName $subjectUnderTest,
        CollectionOf $collectionOf,
        bool $serializationEnabled
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $constants, $properties, $methods, $subjectUnderTest);
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
