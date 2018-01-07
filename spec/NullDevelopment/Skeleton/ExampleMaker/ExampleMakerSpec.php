<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use PhpSpec\ObjectBehavior;

class ExampleMakerSpec extends ObjectBehavior
{
    public function let(ReflectionFactory $reflectionFactory)
    {
        $this->beConstructedWith($reflectionFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExampleMaker::class);
    }
}
