<?php

declare(strict_types=1);

namespace spec\MyVendor\User;

use MyVendor\User\UserFirstName;
use PhpSpec\ObjectBehavior;

class UserFirstNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($firstName = 'John');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserFirstName::class);
    }

    public function it_exposes_first_name()
    {
        $this->getFirstName()->shouldReturn('John');
    }

    public function it_exposes_value()
    {
        $this->getValue()->shouldReturn('John');
    }

    public function it_is_castable_to_string()
    {
        $this->__toString()->shouldReturn('John');
    }

    public function it_can_be_serialized()
    {
        $this->serialize()->shouldReturn('John');
    }

    public function it_can_be_deserialized()
    {
        $this->deserialize('John')->shouldReturnAnInstanceOf(UserFirstName::class);
    }
}
