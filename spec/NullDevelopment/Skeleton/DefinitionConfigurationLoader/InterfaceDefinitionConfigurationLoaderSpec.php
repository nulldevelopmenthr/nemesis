<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\InterfaceDefinitionConfigurationLoader;
use PhpSpec\ObjectBehavior;

class InterfaceDefinitionConfigurationLoaderSpec extends ObjectBehavior
{
    public function let(
        ConstantCollectionFactory $constantCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->beConstructedWith($constantCollectionFactory, $methodCollectionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InterfaceDefinitionConfigurationLoader::class);
        $this->shouldImplement(DefinitionConfigurationLoader::class);
    }

    public function it_supports_interface_type()
    {
        $this->supports(['type' => 'Interface'])->shouldReturn(true);
    }

    public function it_returns_definition_instance_from_given_input(
        ConstantCollectionFactory $constantCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $input = [
            'type'      => 'Interface',
            'name'      => 'MyCompany\\SomeInterface',
            'parent'    => null,
            'constants' => [],
            'methods'   => [],
        ];

        $constantCollectionFactory->create([])->shouldBeCalled()->willReturn([]);
        $methodCollectionFactory->create([])->shouldBeCalled()->willReturn([]);

        $this->load($input)->shouldReturnAnInstanceOf(InterfaceDefinition::class);
    }

    public function it_exposes_default_values()
    {
        $this->getDefaultValues()->shouldReturn(
            [
                'type'      => 'Interface',
                'name'      => null,
                'parent'    => null,
                'constants' => [],
                'methods'   => [],
            ]
        );
    }
}
