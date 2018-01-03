<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method\SpecCreateEventMethod;
use PhpSpec\ObjectBehavior;

class SpecCreateEventMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className, Property $property1, Property $property2)
    {
        $this->beConstructedWith($className, [$property1, $property2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecCreateEventMethod::class);
    }
}
