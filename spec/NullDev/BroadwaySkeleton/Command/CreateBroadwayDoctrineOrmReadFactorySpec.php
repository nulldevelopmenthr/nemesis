<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Command;

use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpSpec\ObjectBehavior;

class CreateBroadwayDoctrineOrmReadFactorySpec extends ObjectBehavior
{
    public function let(ClassType $factoryClassType)
    {
        $this->beConstructedWith($factoryClassType);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateBroadwayDoctrineOrmReadFactory::class);
    }

    public function it_exposes_class_type_of_factory_to_build(ClassType $factoryClassType)
    {
        $this->getFactoryClassType()->shouldReturn($factoryClassType);
    }
}
