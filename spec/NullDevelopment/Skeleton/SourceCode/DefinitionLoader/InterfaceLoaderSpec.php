<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use NullDevelopment\Skeleton\SourceCode\DefinitionLoader;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstantCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\MethodCollectionFactory;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\InterfaceLoader;
use PhpSpec\ObjectBehavior;

class InterfaceLoaderSpec extends ObjectBehavior
{
    public function let(
        ConstantCollectionFactory $constantCollectionFactory,
        MethodCollectionFactory $methodCollectionFactory
    ) {
        $this->beConstructedWith($constantCollectionFactory, $methodCollectionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InterfaceLoader::class);
        $this->shouldImplement(DefinitionLoader::class);
    }
}
