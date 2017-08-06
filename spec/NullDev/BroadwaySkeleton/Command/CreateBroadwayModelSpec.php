<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpSpec\ObjectBehavior;

class CreateBroadwayModelSpec extends ObjectBehavior
{
    public function let(ClassType $modelIdType, ClassType $modelType, ClassType $repositoryType)
    {
        $this->beConstructedWith($modelIdType, $modelType, $repositoryType);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayModel::class);
    }

    public function it_will_expose_model_id_type(ClassType $modelIdType)
    {
        $this->getModelIdType()->shouldReturn($modelIdType);
    }

    public function it_will_expose_model_type(ClassType $modelType)
    {
        $this->getModelType()->shouldReturn($modelType);
    }

    public function it_will_expose_repository_type(ClassType $repositoryType)
    {
        $this->getRepositoryType()->shouldReturn($repositoryType);
    }
}
