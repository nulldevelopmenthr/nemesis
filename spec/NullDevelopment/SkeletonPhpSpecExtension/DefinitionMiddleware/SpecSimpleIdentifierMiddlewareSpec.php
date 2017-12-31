<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleIdentifierFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleIdentifierGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSimpleIdentifierMiddleware;
use PhpSpec\ObjectBehavior;

class SpecSimpleIdentifierMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecSimpleIdentifierFactory $factory, SpecSimpleIdentifierGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleIdentifierMiddleware::class);
    }
}
