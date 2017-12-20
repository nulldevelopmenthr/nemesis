<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Definition;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\Definition\SimpleValueObject;
use NullDevelopment\Skeleton\SourceCode;
use PhpSpec\ObjectBehavior;

class SimpleValueObjectSpec extends ObjectBehavior
{
    public function let(ClassName $name, ConstructorMethod $constructorMethod)
    {
        $this->beConstructedWith($name, null, [], [], $constructorMethod, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleValueObject::class);
        $this->shouldHaveType(ClassType::class);
        $this->shouldImplement(SourceCode::class);
    }
}
