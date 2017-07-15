<?php

declare(strict_types=1);

namespace spec\NullDev\Nemesis\Xxx\PHPUnit\CodeGenerator\PhpParser\Methods;

use NullDev\Nemesis\Xxx\PHPUnit\CodeGenerator\PhpParser\Methods\TestNothingGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class TestNothingGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestNothingGenerator::class);
    }
}
