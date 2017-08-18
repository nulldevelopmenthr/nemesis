<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootId;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use PhpSpec\ObjectBehavior;

class CreateBroadwayAggregateRootIdSpec extends ObjectBehavior
{
    public function let(RootIdClassName $rootIdClassName)
    {
        $this->beConstructedWith($rootIdClassName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayAggregateRootId::class);
    }

    public function it_will_expose_root_id_class_name(RootIdClassName $rootIdClassName)
    {
        $this->getRootIdClassName()->shouldReturn($rootIdClassName);
    }
}
