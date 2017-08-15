<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\CommandHandler\LoadAggregateRootModelGenerator;
use NullDev\Skeleton\CodeGenerator\MethodGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class LoadAggregateRootModelGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LoadAggregateRootModelGenerator::class);
        $this->shouldImplement(MethodGenerator::class);
    }
}
