<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\Definition;

use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpecSpecification;

/**
 * @see SpecSimpleCollectionSpec
 * @see SpecSimpleCollectionTest
 */
class SpecSimpleCollection extends ClassType implements PhpSpecSpecification
{
    /** @var CollectionOf */
    private $collectionOf;
    /** @var ClassName */
    private $subjectUnderTest;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        array $properties,
        array $methods,
        CollectionOf $collectionOf,
        ClassName $subjectUnderTest
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $properties, $methods);
        $this->collectionOf     = $collectionOf;
        $this->subjectUnderTest = $subjectUnderTest;
    }

    public function getCollectionOf(): CollectionOf
    {
        return $this->collectionOf;
    }

    public function getSubjectUnderTest(): ClassName
    {
        return $this->subjectUnderTest;
    }
}
