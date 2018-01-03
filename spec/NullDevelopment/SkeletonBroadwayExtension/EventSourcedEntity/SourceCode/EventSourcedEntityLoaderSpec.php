<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode;

use NullDevelopment\Skeleton\Core\DefinitionLoader;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\SourceCode\EventSourcedEntityLoader;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;
use PhpSpec\ObjectBehavior;

class EventSourcedEntityLoaderSpec extends ObjectBehavior
{
    public function let(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstantCollectionFactory $constantCollectionFactory,
        ConstructorMethodFactory $constructorMethodFactory,
        PropertyCollectionFactory $propertyCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->beConstructedWith(
            $interfaceNameCollectionFactory,
            $traitNameCollectionFactory,
            $constantCollectionFactory,
            $constructorMethodFactory,
            $propertyCollectionFactory,
            $methodCollectionFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventSourcedEntityLoader::class);
        $this->shouldImplement(DefinitionLoader::class);
    }

    public function it_supports_configs_defined_as_broadway_commands()
    {
        $this->supports(['type' => 'BroadwayEventSourcedEntity'])->shouldReturn(true);
    }
}
