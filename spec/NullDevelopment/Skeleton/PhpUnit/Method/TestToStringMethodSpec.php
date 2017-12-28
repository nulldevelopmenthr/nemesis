<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\Skeleton\PhpUnit\Method\TestToStringMethod;
use PhpSpec\ObjectBehavior;

class TestToStringMethodSpec extends ObjectBehavior
{
    public function let(Property $property)
    {
        $this->beConstructedWith($property);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestToStringMethod::class);
    }
}
