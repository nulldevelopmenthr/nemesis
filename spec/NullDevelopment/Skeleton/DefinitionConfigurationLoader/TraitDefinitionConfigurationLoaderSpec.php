<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\Type\TraitDefinition;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\TraitDefinitionConfigurationLoader;
use PhpSpec\ObjectBehavior;

class TraitDefinitionConfigurationLoaderSpec extends ObjectBehavior
{
    public function let(
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstantCollectionFactory $constantCollectionFactory,
        PropertyCollectionFactory $propertyCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->beConstructedWith(
            $traitNameCollectionFactory,
            $constantCollectionFactory,
            $propertyCollectionFactory,
            $methodCollectionFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TraitDefinitionConfigurationLoader::class);
        $this->shouldImplement(DefinitionConfigurationLoader::class);
    }

    public function it_supports_interface_type()
    {
        $this->supports(['type' => 'Trait'])->shouldReturn(true);
    }

    public function it_returns_definition_instance_from_given_input(
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstantCollectionFactory $constantCollectionFactory,
        PropertyCollectionFactory $propertyCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $input = [
            'type'       => 'Trait',
            'instanceOf' => 'MyCompany\\SomeTrait',
            'traits'     => [],
            'constants'  => [],
            'properties' => [],
            'methods'    => [],
        ];

        $traitNameCollectionFactory->create([])->shouldBeCalled()->willReturn([]);
        $constantCollectionFactory->create([])->shouldBeCalled()->willReturn([]);
        $propertyCollectionFactory->create([])->shouldBeCalled()->willReturn([]);
        $methodCollectionFactory->create([])->shouldBeCalled()->willReturn([]);

        $this->load($input)->shouldReturnAnInstanceOf(TraitDefinition::class);
    }

    public function it_exposes_default_values()
    {
        $this->getDefaultValues()->shouldReturn(
            [
                'type'       => 'Trait',
                'instanceOf' => null,
                'traits'     => [],
                'constants'  => [],
                'properties' => [],
                'methods'    => [],
            ]
        );
    }
}
