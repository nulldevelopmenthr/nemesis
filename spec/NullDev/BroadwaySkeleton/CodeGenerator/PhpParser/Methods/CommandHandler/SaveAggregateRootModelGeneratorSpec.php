<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler\SaveAggregateRootModelGenerator;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class SaveAggregateRootModelGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SaveAggregateRootModelGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }
}
