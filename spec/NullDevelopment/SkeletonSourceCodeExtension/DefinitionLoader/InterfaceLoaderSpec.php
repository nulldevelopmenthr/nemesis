<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use NullDevelopment\Skeleton\Core\DefinitionLoader;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\InterfaceLoader;
use PhpSpec\ObjectBehavior;

class InterfaceLoaderSpec extends ObjectBehavior
{
    public function let(
        ConstantCollectionFactory $constantCollectionFactory, MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->beConstructedWith($constantCollectionFactory, $methodCollectionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InterfaceLoader::class);
        $this->shouldImplement(DefinitionLoader::class);
    }
}
