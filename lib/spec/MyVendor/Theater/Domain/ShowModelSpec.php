<?php

declare(strict_types=1);

namespace spec\MyVendor\Theater\Domain;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use MyVendor\Theater\Domain\ShowModel;
use PhpSpec\ObjectBehavior;

class ShowModelSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ShowModel::class);
        $this->shouldHaveType(EventSourcedAggregateRoot::class);
    }

    public function it_exposes_aggregate_root_id()
    {
        $this->getAggregateRootId()->shouldReturn('id');
    }
}