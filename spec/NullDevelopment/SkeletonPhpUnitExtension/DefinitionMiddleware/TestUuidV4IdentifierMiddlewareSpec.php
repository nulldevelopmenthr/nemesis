<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestUuidV4IdentifierFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestUuidV4IdentifierGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestUuidV4IdentifierMiddleware;
use PhpSpec\ObjectBehavior;

class TestUuidV4IdentifierMiddlewareSpec extends ObjectBehavior
{
    public function let(TestUuidV4IdentifierFactory $factory, TestUuidV4IdentifierGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestUuidV4IdentifierMiddleware::class);
    }
}
