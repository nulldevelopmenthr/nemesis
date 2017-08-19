<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadProjector;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpSpec\ObjectBehavior;

class CreateBroadwayDoctrineOrmReadProjectorSpec extends ObjectBehavior
{
    public function let(ClassType $projectorClassType, Parameter $parameter1)
    {
        $this->beConstructedWith($projectorClassType, $entityParameters = [$parameter1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayDoctrineOrmReadProjector::class);
    }

    public function it_exposes_class_type_of_projector_to_build(ClassType $projectorClassType)
    {
        $this->getProjectorClassType()->shouldReturn($projectorClassType);
    }

    public function it_exposes_parameters_of_entity_to_build(Parameter $parameter1)
    {
        $this->getEntityParameters()->shouldReturn([$parameter1]);
    }
}
