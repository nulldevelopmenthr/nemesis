<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootRepository;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use PhpSpec\ObjectBehavior;

class CreateBroadwayAggregateRootRepositorySpec extends ObjectBehavior
{
    public function let(RootRepositoryClassName $repositoryClassName, RootModelClassName $modelClassName)
    {
        $this->beConstructedWith($repositoryClassName, $modelClassName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayAggregateRootRepository::class);
    }

    public function it_will_expose_repository_class_name(RootRepositoryClassName $repositoryClassName)
    {
        $this->getRepositoryClassName()->shouldReturn($repositoryClassName);
    }

    public function it_will_expose_model_class_name(RootModelClassName $modelClassName)
    {
        $this->getModelClassName()->shouldReturn($modelClassName);
    }
}
