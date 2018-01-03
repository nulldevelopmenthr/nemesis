<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\Method;

use NullDevelopment\SkeletonBroadwayExtension\Event\SourceCodeGenerator\Method\CreateEventMethodGenerator;
use PhpSpec\ObjectBehavior;

class CreateEventMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventMethodGenerator::class);
    }
}
