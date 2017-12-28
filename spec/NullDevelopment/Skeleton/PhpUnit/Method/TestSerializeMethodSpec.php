<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\Skeleton\PhpUnit\Method\TestSerializeMethod;
use PhpSpec\ObjectBehavior;

class TestSerializeMethodSpec extends ObjectBehavior
{
    public function let(Property $property1)
    {
        $this->beConstructedWith([$property1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSerializeMethod::class);
    }
}
