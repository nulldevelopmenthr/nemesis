<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Parameter;
use PhpSpec\ObjectBehavior;

class CreateBroadwayDoctrineOrmReadSpec extends ObjectBehavior
{
    public function let(
        ClassType $entityClassType,
        Parameter $parameter1,
        ClassType $repositoryClassType,
        ClassType $factoryClassType,
        ClassType $projectorClassType
    ) {
        $this->beConstructedWith(
            $entityClassType,
            $entityParameters = [$parameter1],
            $repositoryClassType,
            $factoryClassType,
            $projectorClassType
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayDoctrineOrmRead::class);
    }

    public function it_exposes_class_type_of_entity_to_build(ClassType $entityClassType)
    {
        $this->getEntityClassType()->shouldReturn($entityClassType);
    }

    public function it_exposes_parameters_of_entity_to_build(Parameter $parameter1)
    {
        $this->getEntityParameters()->shouldReturn([$parameter1]);
    }

    public function it_exposes_class_type_of_repository_to_build(ClassType $repositoryClassType)
    {
        $this->getRepositoryClassType()->shouldReturn($repositoryClassType);
    }

    public function it_exposes_class_type_of_factory_to_build(ClassType $factoryClassType)
    {
        $this->getFactoryClassType()->shouldReturn($factoryClassType);
    }

    public function it_exposes_class_type_of_projector_to_build(ClassType $projectorClassType)
    {
        $this->getProjectorClassType()->shouldReturn($projectorClassType);
    }
}
