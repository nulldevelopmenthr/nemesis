<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\DataTypeName;

use NullDevelopment\PhpStructure\DataTypeName\ConstantName;
use PhpSpec\ObjectBehavior;

class ConstantNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'MINIMUM_AMOUNT');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConstantName::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('MINIMUM_AMOUNT');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('MINIMUM_AMOUNT');
    }
}
