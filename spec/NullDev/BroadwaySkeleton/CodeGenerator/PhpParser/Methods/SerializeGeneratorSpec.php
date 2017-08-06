<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\SerializeGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class SerializeGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SerializeGenerator::class);
    }
}
