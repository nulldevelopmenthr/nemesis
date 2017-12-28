<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Method\SetUpMethod;
use PhpSpec\ObjectBehavior;

class SetUpMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className, Property $property1, Property $property2)
    {
        $this->beConstructedWith($className, [$property1, $property2]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SetUpMethod::class);
    }
}
