<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\Definition;

//use NullDevelopment\Skeleton\SourceCode;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode;
use PhpSpec\ObjectBehavior;

class DateTimeValueObjectSpec extends ObjectBehavior
{
    public function let(ClassName $name)
    {
        $this->beConstructedWith($name, null, [], [], null, []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeValueObject::class);
        $this->shouldHaveType(ClassType::class);
        $this->shouldImplement(SourceCode::class);
    }
}
