<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestToStringMethod;
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
