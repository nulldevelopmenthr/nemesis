<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\Method;

use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCodeGenerator\Method\LoadMethodGenerator;
use PhpSpec\ObjectBehavior;

class LoadMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LoadMethodGenerator::class);
    }
}
