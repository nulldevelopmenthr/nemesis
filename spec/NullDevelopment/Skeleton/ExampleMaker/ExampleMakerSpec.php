<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use PhpSpec\ObjectBehavior;

class ExampleMakerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExampleMaker::class);
    }
}
