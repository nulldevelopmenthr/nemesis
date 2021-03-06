<?php

declare(strict_types=1);

namespace spec\MyVendor;

use DateTime;
use MyVendor\Base\UserEntity as BaseUser;
use MyVendor\SomeInterface;
use MyVendor\User\UserCreatedAt;
use MyVendor\User\UserFirstName;
use MyVendor\User\UserId;
use MyVendor\User\Username;
use MyVendor\UserEntity;
use PhpSpec\ObjectBehavior;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class UserEntitySpec extends ObjectBehavior
{
    public function let(
        UserId $id, UserFirstName $firstName, Username $username, UserCreatedAt $createdAt, DateTime $updatedAt
    ) {
        $this->beConstructedWith(
            $id, $firstName, $lastName = 'lastName', $username, $active = true, $createdAt, $updatedAt
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserEntity::class);
        $this->shouldHaveType(BaseUser::class);
        $this->shouldImplement(SomeInterface::class);
        $this->shouldImplement(SomeInterface::class);
    }

    public function it_exposes_id(UserId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_first_name(UserFirstName $firstName)
    {
        $this->getFirstName()->shouldReturn($firstName);
    }

    public function it_exposes_last_name()
    {
        $this->getLastName()->shouldReturn('lastName');
    }

    public function it_exposes_username(Username $username)
    {
        $this->getUsername()->shouldReturn($username);
    }

    public function it_exposes_is_active()
    {
        $this->isActive()->shouldReturn(true);
    }

    public function it_exposes_created_at(UserCreatedAt $createdAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
    }

    public function it_exposes_updated_at(DateTime $updatedAt)
    {
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }

    public function it_can_set_username(Username $otherUsername)
    {
        $this->setUsername($otherUsername);
        $this->getUsername()->shouldReturn($otherUsername);
    }

    public function it_can_set_first_name(UserFirstName $otherFirstName)
    {
        $this->setFirstName($otherFirstName);
        $this->getFirstName()->shouldReturn($otherFirstName);
    }

    public function it_has_last_name()
    {
        $this->hasLastName()->shouldReturn(true);
    }

    public function it_can_be_serialized(
        UserId $id, UserFirstName $firstName, Username $username, UserCreatedAt $createdAt, DateTime $updatedAt
    ) {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $firstName->serialize()->shouldBeCalled()->willReturn('Amy');
        $username->serialize()->shouldBeCalled()->willReturn('username');
        $createdAt->serialize()->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $updatedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(
            [
                'id'        => 1,
                'firstName' => 'Amy',
                'lastName'  => 'lastName',
                'username'  => 'username',
                'active'    => true,
                'createdAt' => '2018-01-01T00:01:00+00:00',
                'updatedAt' => '2018-01-01T00:01:00+00:00',
            ]
        );
    }

    public function it_can_be_deserialized()
    {
        $input = [
            'id'        => 1,
            'firstName' => 'Amy',
            'lastName'  => 'lastName',
            'username'  => 'username',
            'active'    => true,
            'createdAt' => '2018-01-01T00:01:00+00:00',
            'updatedAt' => '2018-01-01T00:01:00+00:00',
        ];

        $this->deserialize($input)->shouldReturnAnInstanceOf(UserEntity::class);
    }
}
