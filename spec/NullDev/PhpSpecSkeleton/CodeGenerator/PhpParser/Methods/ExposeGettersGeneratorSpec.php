<?php

declare(strict_types=1);

namespace spec\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\ExposeGettersGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class ExposeGettersGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExposeGettersGenerator::class);
    }
}
