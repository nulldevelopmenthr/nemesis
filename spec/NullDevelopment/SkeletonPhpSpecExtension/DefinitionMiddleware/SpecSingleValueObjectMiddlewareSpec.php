<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSingleValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSingleValueObjectGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSingleValueObjectMiddleware;
use PhpSpec\ObjectBehavior;

class SpecSingleValueObjectMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecSingleValueObjectFactory $factory, SpecSingleValueObjectGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSingleValueObjectMiddleware::class);
    }
}
