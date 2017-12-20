<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\Skeleton\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\DateTimeValueObjectLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;
use PhpSpec\ObjectBehavior;

class DateTimeValueObjectLoaderSpec extends ObjectBehavior
{
    public function let(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory
    ) {
        $this->beConstructedWith(
            $interfaceNameCollectionFactory,
            $traitNameCollectionFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeValueObjectLoader::class);
        $this->shouldImplement(DefinitionConfigurationLoader::class);
    }

    public function it_will_return_object_from_given_configuration(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory
    ) {
        $input = [
            'type'        => 'DateTimeValueObject',
            'instanceOf'  => 'MyVendor\\User\\UserId',
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
        ];

        $interfaceNameCollectionFactory->create([])->shouldBeCalled()->willReturn([]);
        $traitNameCollectionFactory->create([])->shouldBeCalled()->willReturn([]);

        $this->load($input)
            ->shouldReturnAnInstanceOf(DateTimeValueObject::class);
    }
}
