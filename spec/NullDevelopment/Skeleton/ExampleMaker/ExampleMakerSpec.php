<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\Skeleton\ExampleMaker\DefinitionExampleFactory;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use PhpSpec\ObjectBehavior;

class ExampleMakerSpec extends ObjectBehavior
{
    public function let(ReflectionFactory $reflectionFactory, DefinitionExampleFactory $definitionExampleFactory)
    {
        $this->beConstructedWith($reflectionFactory, $definitionExampleFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExampleMaker::class);
    }
}
