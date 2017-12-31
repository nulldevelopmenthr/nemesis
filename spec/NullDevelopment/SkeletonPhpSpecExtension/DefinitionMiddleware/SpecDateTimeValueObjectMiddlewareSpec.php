<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecDateTimeValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecDateTimeValueObjectGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecDateTimeValueObjectMiddleware;
use PhpSpec\ObjectBehavior;

class SpecDateTimeValueObjectMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecDateTimeValueObjectFactory $factory, SpecDateTimeValueObjectGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeValueObjectMiddleware::class);
    }
}
