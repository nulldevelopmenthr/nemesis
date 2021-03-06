<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\ReadSide;

use NullDev\Theater\ReadSide\ReadSideConfig;
use NullDev\Theater\ReadSide\ReadSideImplementation;
use NullDev\Theater\ReadSide\ReadSideName;
use NullDev\Theater\ReadSide\ReadSideNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use PhpSpec\ObjectBehavior;

class ReadSideConfigSpec extends ObjectBehavior
{
    public function let(
        ReadSideName $name,
        ReadSideNamespace $namespace,
        ReadSideImplementation $implementation,
        ClassName $readEntity,
        ClassName $readRepository,
        ClassName $readProjector,
        ClassName $readFactory
    ) {
        $this->beConstructedWith(
            $name,
            $namespace,
            $implementation,
            $readEntity,
            $readRepository,
            $readProjector,
            $readFactory,
            $properties = []
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ReadSideConfig::class);
    }

    public function it_will_expose_constructor_arguments(
        ReadSideName $name,
        ReadSideNamespace $namespace,
        ReadSideImplementation $implementation,
        ClassName $readEntity,
        ClassName $readRepository,
        ClassName $readProjector,
        ClassName $readFactory
    ) {
        $this->getName()->shouldReturn($name);
        $this->getNamespace()->shouldReturn($namespace);
        $this->getImplementation()->shouldReturn($implementation);
        $this->getReadEntity()->shouldReturn($readEntity);
        $this->getReadRepository()->shouldReturn($readRepository);
        $this->getReadProjector()->shouldReturn($readProjector);
        $this->getReadFactory()->shouldReturn($readFactory);
        $this->getProperties()->shouldReturn([]);
    }
}
