<?php

declare(strict_types=1);

namespace spec\MyVendor;

use MyVendor\User\UserId;
use MyVendor\UserCollection;
use MyVendor\UserEntity;
use PhpSpec\ObjectBehavior;

class UserCollectionSpec extends ObjectBehavior
{
    public function let(UserEntity $userEntity)
    {
        $this->beConstructedWith($elements = [$userEntity]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserCollection::class);
    }

    public function it_exposes_elements(UserEntity $userEntity)
    {
        $this->toArray()->shouldReturn([$userEntity]);
    }

    public function it_exposes_number_of_elements_in_collection()
    {
        $this->count()->shouldReturn(1);
    }

    public function it_supports_add_new_element(UserEntity $anotherUserEntity)
    {
        $this->add($anotherUserEntity);
        $this->count()->shouldReturn(2);
    }

    public function it_knows_if_element_is_in_collection(UserEntity $userEntity, UserId $userId)
    {
        $userEntity->getId()->shouldBeCalled()->willReturn($userId);
        $this->has($userId)->shouldReturn(true);
    }

    public function it_can_return_element_from_collection_by_given_id(UserEntity $userEntity, UserId $userId)
    {
        $userEntity->getId()->shouldBeCalled()->willReturn($userId);
        $this->get($userId)->shouldReturn($userEntity);
    }
}
