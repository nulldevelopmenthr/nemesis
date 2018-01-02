<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode;

use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstructorMethodFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\CommandLoader;
use PhpSpec\ObjectBehavior;

class CommandLoaderSpec extends ObjectBehavior
{
    public function let(
        InterfaceNameCollectionFactory $interfaceNameCollectionFactory,
        TraitNameCollectionFactory $traitNameCollectionFactory,
        ConstantCollectionFactory $constantCollectionFactory,
        ConstructorMethodFactory $constructorMethodFactory,
        PropertyCollectionFactory $propertyCollectionFactory
    ) {
        $this->beConstructedWith(
            $interfaceNameCollectionFactory,
            $traitNameCollectionFactory,
            $constantCollectionFactory,
            $constructorMethodFactory,
            $propertyCollectionFactory
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommandLoader::class);
        $this->shouldImplement(DefinitionLoader::class);
    }

    public function it_supports_configs_defined_as_broadway_commands()
    {
        $this->supports(['type' => 'BroadwayCommand'])->shouldReturn(true);
    }
}
