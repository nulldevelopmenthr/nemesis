<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\ReadSide;

use NullDev\Theater\ReadSide\ReadSideConfig;
use NullDev\Theater\ReadSide\ReadSideConfigFactory;
use NullDev\Theater\ReadSide\ReadSideImplementation;
use NullDev\Theater\ReadSide\ReadSideName;
use NullDev\Theater\ReadSide\ReadSideNamespace;
use PhpSpec\ObjectBehavior;

class ReadSideConfigFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ReadSideConfigFactory::class);
    }

    public function it_will_create_read_side_configuration_from_given_strings(
        ReadSideName $readSideName,
        ReadSideNamespace $readSideNamespace,
        ReadSideImplementation $readSideImplementation
    ) {
        $readSideName->getValue()->shouldBeCalled()->willReturn('CounterX');
        $readSideNamespace->getValue()->shouldBeCalled()->willReturn('MyCompany\Statistics');
        $parameters = [];

        $this->create($readSideName, $readSideNamespace, $readSideImplementation, $parameters)
            ->shouldReturnAnInstanceOf(ReadSideConfig::class);
    }

    public function it_will_create_read_side_configuration_from_given_array()
    {
        $name  = 'CounterX';
        $input = [
            'namespace'      => 'MyCompany\Statistics',
            'implementation' => 'DoctrineORM',
            'classes'        => [
                'entity'     => 'MyCompany\Statistics\CounterXEntity',
                'repository' => 'MyCompany\Statistics\CounterXRepository',
                'projector'  => 'MyCompany\Statistics\CounterXProjector',
                'factory'    => 'MyCompany\Statistics\CounterXFactory',
            ],
            'properties' => [
                'firstName' => 'string',
                'age'       => 'int',
                'createdAt' => 'DateTime',
            ],
        ];

        $this->createFromArray($name, $input)
            ->shouldReturnAnInstanceOf(ReadSideConfig::class);
    }
}
