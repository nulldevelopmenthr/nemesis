<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootModel;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use PhpSpec\ObjectBehavior;

class CreateBroadwayAggregateRootModelSpec extends ObjectBehavior
{
    public function let(RootModelClassName $modelClassName, RootIdClassName $rootIdClassName)
    {
        $this->beConstructedWith($modelClassName, $rootIdClassName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayAggregateRootModel::class);
    }

    public function it_will_expose_model_class_name(RootModelClassName $modelClassName)
    {
        $this->getModelClassName()->shouldReturn($modelClassName);
    }

    public function it_will_expose_root_id_class_name(RootIdClassName $rootIdClassName)
    {
        $this->getRootIdClassName()->shouldReturn($rootIdClassName);
    }
}
