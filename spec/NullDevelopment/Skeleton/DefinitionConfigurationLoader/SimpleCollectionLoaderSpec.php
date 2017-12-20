<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\PhpStructure\Behaviour\Method\ConstructorMethod;
use NullDevelopment\Skeleton\Definition\SimpleCollection;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleCollectionLoader;
use PhpSpec\ObjectBehavior;

class SimpleCollectionLoaderSpec extends ObjectBehavior
{
    public function let(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstructorMethodFactory $constructorMethodFactory,
        PropertyCollectionFactory $propertyCollectionFactory
    ) {
        $this->beConstructedWith(
            $interfaceNameCollectionFactory,
            $traitNameCollectionFactory,
            $constructorMethodFactory,
            $propertyCollectionFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollectionLoader::class);
    }

    public function it_will_return_object_from_given_configuration(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstructorMethodFactory $constructorMethodFactory,
        PropertyCollectionFactory $propertyCollectionFactory,
        ConstructorMethod $constructorMethod
    ) {
        $constructorParams = [
            'id' => [
                'instanceOf'  => 'integer',
                'nullable'    => false,
                'hasDefault'  => false,
                'default'     => null,
            ],
        ];

        $input = [
            'type'          => 'SimpleCollection',
            'instanceOf'    => 'MyVendor\\User\\Users',
            'parent'        => null,
            'interfaces'    => [],
            'traits'        => [],
            'constructor'   => $constructorParams,
            'collectionOf'  => [
                'instanceOf' => 'MyVendor\ProductEntity',
                'accessor'   => 'getId',
                'has'        => 'MyVendor\Product\ProductId',
            ],
        ];

        $interfaceNameCollectionFactory->create([])->shouldBeCalled()->willReturn([]);
        $traitNameCollectionFactory->create([])->shouldBeCalled()->willReturn([]);
        $constructorMethodFactory->create($constructorParams)->shouldBeCalled()->willReturn($constructorMethod);
        $propertyCollectionFactory->create($constructorParams)->shouldBeCalled()->willReturn([]);

        $this->load($input)
            ->shouldReturnAnInstanceOf(SimpleCollection::class);
    }
}
