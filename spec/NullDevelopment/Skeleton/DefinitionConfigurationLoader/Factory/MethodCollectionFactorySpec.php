<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory;

use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\MethodCollectionFactory;
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
