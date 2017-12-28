<?php

declare(strict_types=1);

namespace spec\MyVendor\User;

use MyVendor\User\UserId;
use PhpSpec\ObjectBehavior;

class UserIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 1);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserId::class);
    }

    public function it_exposes_id()
    {
        $this->getId()->shouldReturn(1);
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('1');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn(1);
    }

    public function it_can_be_deserialized()
    {
        $this->deserialize(1)->shouldReturnAnInstanceOf(UserId::class);
    }
}
