<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\ReadSide;

use Exception;
use NullDev\Theater\ReadSide\ReadSideName;
use PhpSpec\ObjectBehavior;

class ReadSideNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'LocalUser');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ReadSideName::class);
    }

    public function it_exposes_name_via_get_value()
    {
        $this->getValue()->shouldReturn('LocalUser');
    }

    public function it_can_be_converted_to_string()
    {
        $this->__toString()->shouldReturn('LocalUser');
    }

    public function it_will_throw_exception_if_name_has_non_alphanumeric_characters()
    {
        $expectedException = new Exception('Name can use only alphanumeric characters.');

        $this->shouldThrow($expectedException)->during('__construct', ['Something\User']);
    }

    public function it_will_throw_exception_if_empty_string_given()
    {
        $expectedException = new Exception('Name should not be empty.');

        $this->shouldThrow($expectedException)->during('__construct', ['']);
    }
}
