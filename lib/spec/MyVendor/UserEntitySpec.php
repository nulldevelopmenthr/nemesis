<?php

declare(strict_types=1);

namespace spec\MyVendor;

use DateTime;
use MyVendor\User\UserCreatedAt;
use MyVendor\User\UserId;
use MyVendor\User\Username;
use MyVendor\UserEntity;
use PhpSpec\ObjectBehavior;

class UserEntitySpec extends ObjectBehavior
{
    public function let(UserId $id, Username $username, UserCreatedAt $createdAt, DateTime $updatedAt)
    {
        $this->beConstructedWith($id, $firstName = 'firstName', $lastName = 'lastName', $username, $createdAt, $updatedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserEntity::class);
    }

    public function it_exposes_id(UserId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_first_name()
    {
        $this->getFirstName()->shouldReturn('firstName');
    }

    public function it_exposes_last_name()
    {
        $this->getLastName()->shouldReturn('lastName');
    }

    public function it_exposes_username(Username $username)
    {
        $this->getUsername()->shouldReturn($username);
    }

    public function it_exposes_created_at(UserCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_exposes_updated_at(DateTime $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_can_be_serialized(UserId $id, Username $username, UserCreatedAt $createdAt, DateTime $updatedAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $username->serialize()->shouldBeCalled()->willReturn('username');
        $createdAt->serialize()->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $updatedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(['id' => 1, 'firstName' => 'firstName', 'lastName' => 'lastName', 'username' => 'username', 'createdAt' => '2018-01-01T00:01:00+00:00', 'updatedAt' => '2018-01-01T00:01:00+00:00']);
    }

    public function it_can_be_deserialized(UserId $id, Username $username, UserCreatedAt $createdAt, DateTime $updatedAt)
    {
        $this->deserialize(['id' => 1, 'firstName' => 'firstName', 'lastName' => 'lastName', 'username' => 'username', 'createdAt' => '2018-01-01T00:01:00+00:00', 'updatedAt' => '2018-01-01T00:01:00+00:00'])->shouldReturnAnInstanceOf(UserEntity::class);
    }
}
