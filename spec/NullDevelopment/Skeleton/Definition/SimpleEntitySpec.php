<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Definition;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\Definition\SimpleEntity;
use NullDevelopment\Skeleton\SourceCode;
use PhpSpec\ObjectBehavior;

class SimpleEntitySpec extends ObjectBehavior
{
    public function let(ClassName $name, ConstructorMethod $constructorMethod)
    {
        $this->beConstructedWith($name, null, [], [], $constructorMethod, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleEntity::class);
        $this->shouldHaveType(ClassType::class);
        $this->shouldImplement(SourceCode::class);
    }
}
