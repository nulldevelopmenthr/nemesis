<?php

declare(strict_types=1);

namespace spec\MyVendor\Theater\Domain;

use Broadway\EventSourcing\SimpleEventSourcedEntity;
use MyVendor\Theater\Domain\ActorEntity;
use PhpSpec\ObjectBehavior;

class ActorEntitySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 1, $firstName = 'firstName', $lastName = 'lastName');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ActorEntity::class);
        $this->shouldHaveType(SimpleEventSourcedEntity::class);
    }
}
