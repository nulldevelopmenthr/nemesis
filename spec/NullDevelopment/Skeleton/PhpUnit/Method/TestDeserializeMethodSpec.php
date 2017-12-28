<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDeserializeMethod;
use PhpSpec\ObjectBehavior;

class TestDeserializeMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className, Property $property1)
    {
        $this->beConstructedWith($className, [$property1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDeserializeMethod::class);
    }
}
