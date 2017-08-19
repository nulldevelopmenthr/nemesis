<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\ReadSide;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Theater\ReadSide\ReadSideConfig;
use NullDev\Theater\ReadSide\ReadSideImplementation;
use NullDev\Theater\ReadSide\ReadSideName;
use NullDev\Theater\ReadSide\ReadSideNamespace;
use PhpSpec\ObjectBehavior;

class ReadSideConfigSpec extends ObjectBehavior
{
    public function let(
        ReadSideName $name,
        ReadSideNamespace $namespace,
        ReadSideImplementation $implementation,
        ClassType $readEntity,
        ClassType $readRepository,
        ClassType $readProjector,
        ClassType $readFactory
    ) {
        $this->beConstructedWith(
            $name,
            $namespace,
            $implementation,
            $readEntity,
            $readRepository,
            $readProjector,
            $readFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ReadSideConfig::class);
    }

    public function it_will_expose_constructor_arguments(
        ReadSideName $name,
        ReadSideNamespace $namespace,
        ReadSideImplementation $implementation
    ) {
        $this->getName()->shouldReturn($name);
        $this->getNamespace()->shouldReturn($namespace);
        $this->getImplementation()->shouldReturn($implementation);
    }
}
