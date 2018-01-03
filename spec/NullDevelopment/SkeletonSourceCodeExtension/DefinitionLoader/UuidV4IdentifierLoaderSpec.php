<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use NullDevelopment\Skeleton\Core\DefinitionLoader;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\UuidV4IdentifierLoader;
use PhpSpec\ObjectBehavior;

class UuidV4IdentifierLoaderSpec extends ObjectBehavior
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
        $this->shouldHaveType(UuidV4IdentifierLoader::class);
        $this->shouldImplement(DefinitionLoader::class);
    }

    public function it_supports_configs_defined_as_single_value_objects()
    {
        $this->supports(['type' => 'UuidV4Identifier'])->shouldReturn(true);
    }
}
