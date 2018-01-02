<?php

declare(strict_types=1);

namespace spec\MyVendor\Theater\Domain\Event;

use DateTime;
use MyVendor\Theater\Core\Actor;
use MyVendor\Theater\Core\ShowId;
use MyVendor\Theater\Domain\Event\ActorAddedToCast;
use PhpSpec\ObjectBehavior;

class ActorAddedToCastSpec extends ObjectBehavior
{
    public function let(ShowId $id, Actor $actor, DateTime $addedAt)
    {
        $this->beConstructedWith($id, $actor, $addedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ActorAddedToCast::class);
    }

    public function it_exposes_id(ShowId $id)
    {
        $this->getId()->shouldReturn($id);
    }

    public function it_exposes_actor(Actor $actor)
    {
        $this->getActor()->shouldReturn($actor);
    }

    public function it_exposes_added_at(DateTime $addedAt)
    {
        $this->getAddedAt()->shouldReturn($addedAt);
    }

    public function it_can_be_serialized(ShowId $id, Actor $actor, DateTime $addedAt)
    {
        $id->serialize()->shouldBeCalled()->willReturn(1);
        $actor->serialize()->shouldBeCalled()->willReturn(1);
        $addedAt->format('c')->shouldBeCalled()->willReturn('2018-01-01T00:01:00+00:00');
        $this->serialize()->shouldReturn(['id' => 1, 'actor' => 1, 'addedAt' => '2018-01-01T00:01:00+00:00']);
    }

    public function it_can_be_deserialized()
    {
        $input = ['id' => 1, 'actor' => 1, 'addedAt' => '2018-01-01T00:01:00+00:00'];

        $this->deserialize($input)->shouldReturnAnInstanceOf(ActorAddedToCast::class);
    }
}
