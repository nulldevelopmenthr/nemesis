<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\Skeleton\DefinitionConfigurationLoader;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleValueObjectLoader;
use PhpSpec\ObjectBehavior;

class SimpleValueObjectLoaderSpec extends ObjectBehavior
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
        $this->shouldHaveType(SimpleValueObjectLoader::class);
        $this->shouldImplement(DefinitionConfigurationLoader::class);
    }
}
