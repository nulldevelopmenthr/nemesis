<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Definition;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\SourceCode;

/**
 * @see SimpleCollectionSpec
 * @see SimpleCollectionTest
 */
class SimpleCollection extends ClassType implements SourceCode
{
    /**
     * @var CollectionOf
     */
    private $collectionOf;

    public function __construct(
        ClassName $name,
        ?ClassName $parent,
        array $interfaces,
        array $traits,
        ?ConstructorMethod $constructorMethod,
        array $properties,
        CollectionOf $collectionOf
    ) {
        parent::__construct($name, $parent, $interfaces, $traits, $constructorMethod, $properties);
        $this->collectionOf = $collectionOf;
    }

    public function getCollectionOf(): CollectionOf
    {
        return $this->collectionOf;
    }

    public function toArray(): array
    {
        $data= parent::toArray();

        $data['definition']['collectionOf']=[
            'instanceOf' => $this->collectionOf->getClassName()->getFullName(),
            'accessor'   => $this->collectionOf->getAccessor(),
            'has'        => $this->collectionOf->getHas()->getFullName(),
        ];

        return $data;
    }

    public function getGenerationPriority(): int
    {
        return 90;
    }
}
