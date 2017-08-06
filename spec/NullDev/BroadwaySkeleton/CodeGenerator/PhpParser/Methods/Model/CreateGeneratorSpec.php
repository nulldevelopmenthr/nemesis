<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\CreateGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class CreateGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateGenerator::class);
    }
}
