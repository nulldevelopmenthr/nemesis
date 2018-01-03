<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\TraitLoader;
use PhpSpec\ObjectBehavior;

class TraitLoaderSpec extends ObjectBehavior
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
        $this->shouldHaveType(TraitLoader::class);
        $this->shouldImplement(DefinitionLoader::class);
    }
}
