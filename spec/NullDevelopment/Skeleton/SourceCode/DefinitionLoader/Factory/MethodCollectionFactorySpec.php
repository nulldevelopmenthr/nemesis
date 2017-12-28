<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\MethodCollectionFactory;
use PhpSpec\ObjectBehavior;

class MethodCollectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MethodCollectionFactory::class);
    }
}
