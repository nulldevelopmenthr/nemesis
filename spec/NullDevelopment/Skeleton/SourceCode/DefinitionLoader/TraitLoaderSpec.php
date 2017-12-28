<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\TraitNameCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\TraitLoader;
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
