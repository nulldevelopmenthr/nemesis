<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\DeserializeGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class DeserializeGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DeserializeGenerator::class);
    }
}
