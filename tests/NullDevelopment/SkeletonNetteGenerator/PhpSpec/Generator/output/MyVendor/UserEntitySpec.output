<?php

declare(strict_types=1);

namespace spec\MyVendor;

use DateTime;
use MyVendor\UserEntity;
use MyVendor\User\UserCreatedAt;
use MyVendor\User\UserId;
use MyVendor\User\Username;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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


    public function it_exposes_firstName()
    {
        $this->getFirstName()->shouldReturn('firstName');
    }


    public function it_exposes_lastName()
    {
        $this->getLastName()->shouldReturn('lastName');
    }


    public function it_exposes_username(Username $username)
    {
        $this->getUsername()->shouldReturn($username);
    }


    public function it_exposes_createdAt(UserCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }


    public function it_exposes_updatedAt(DateTime $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }


    public function it_is_serializable(UserId $id, Username $username, UserCreatedAt $createdAt, DateTime $updatedAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $username->serialize()->shouldBeCalled()->willReturn('username');
        $createdAt->serialize()->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $updatedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01 00:01:00');
        $this->serialize()->shouldReturn(['id' => 1, 'firstName' => 'firstName', 'lastName' => 'lastName', 'username' => 'username', 'createdAt' => '2018-01-01 00:01:00', 'updatedAt' => '2018-01-01 00:01:00']);
    }


    public function it_is_deserializable()
    {
        $this->deserialize(['id' => 1, 'firstName' => 'firstName', 'lastName' => 'lastName', 'username' => 'username', 'createdAt' => '2018-01-01 00:01:00', 'updatedAt' => '2018-01-01 00:01:00'])->shouldReturnAnInstanceOf(UserEntity::class);
    }
}
