<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\ReadModelIdGetterGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class ReadModelIdGetterGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ReadModelIdGetterGenerator::class);
    }
}
