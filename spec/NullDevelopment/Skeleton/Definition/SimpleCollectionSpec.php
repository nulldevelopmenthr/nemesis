<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Definition;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode;
use PhpSpec\ObjectBehavior;

class SimpleCollectionSpec extends ObjectBehavior
{
    public function let(ClassName $name, ConstructorMethod $constructorMethod, CollectionOf $collectionOf)
    {
        $this->beConstructedWith($name, null, [], [], $constructorMethod, [], $collectionOf);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollection::class);
        $this->shouldHaveType(ClassType::class);
        $this->shouldImplement(SourceCode::class);
    }
}
