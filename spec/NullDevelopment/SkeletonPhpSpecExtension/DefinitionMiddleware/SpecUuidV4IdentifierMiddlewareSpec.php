<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecUuidV4IdentifierGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecUuidV4IdentifierMiddleware;
use PhpSpec\ObjectBehavior;

class SpecUuidV4IdentifierMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecUuidV4IdentifierFactory $factory, SpecUuidV4IdentifierGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecUuidV4IdentifierMiddleware::class);
    }
}
