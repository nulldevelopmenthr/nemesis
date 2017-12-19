<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\ConstantName;
use PhpSpec\ObjectBehavior;

class ConstantSpec extends ObjectBehavior
{
    public function let(ConstantName $name)
    {
        $this->beConstructedWith($name, $value = 123);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Constant::class);
    }

    public function it_exposes_name(ConstantName $name)
    {
        $this->getConstantName()->shouldReturn($name);
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn(123);
    }
}
