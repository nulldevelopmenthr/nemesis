<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator\Method;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCodeGenerator\Method\RemoveMethodGenerator;
use PhpSpec\ObjectBehavior;

class RemoveMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RemoveMethodGenerator::class);
    }
}
