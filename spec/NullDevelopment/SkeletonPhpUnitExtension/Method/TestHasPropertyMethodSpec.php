<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestHasPropertyMethod;
use PhpSpec\ObjectBehavior;

class TestHasPropertyMethodSpec extends ObjectBehavior
{
    public function let(Property $property)
    {
        $this->beConstructedWith($name = 'testHasFirstName', $methodUnderTest = 'hasFirstName', $property);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestHasPropertyMethod::class);
        $this->shouldImplement(Method::class);
    }
}
