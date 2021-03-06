<?php

declare(strict_types=1);

namespace spec\MyVendor\Theater\Domain\Command;

use MyVendor\Theater\Core\Actor;
use MyVendor\Theater\Core\ShowId;
use MyVendor\Theater\Domain\Command\AddActorToCast;
use PhpSpec\ObjectBehavior;

class AddActorToCastSpec extends ObjectBehavior
{
    public function let(ShowId $id, Actor $actor)
    {
        $this->beConstructedWith($id, $actor);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AddActorToCast::class);
    }

    public function it_exposes_id(ShowId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_actor(Actor $actor)
    {
        $this->getActor()->shouldReturn($actor);
    }

    public function it_can_be_serialized(ShowId $id, Actor $actor)
    {
        $id->serialize()->shouldBeCalled()->willReturn('id');
        $actor->serialize()->shouldBeCalled()->willReturn(1);
        $this->serialize()->shouldReturn(['id' => 'id', 'actor' => 1]);
    }

    public function it_can_be_deserialized()
    {
        $input = ['id' => 'id', 'actor' => 1];

        $this->deserialize($input)->shouldReturnAnInstanceOf(AddActorToCast::class);
    }
}
