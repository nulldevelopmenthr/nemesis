<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleIdentifierFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleIdentifierGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSimpleIdentifierMiddleware;
use PhpSpec\ObjectBehavior;

class TestSimpleIdentifierMiddlewareSpec extends ObjectBehavior
{
    public function let(TestSimpleIdentifierFactory $factory, TestSimpleIdentifierGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleIdentifierMiddleware::class);
    }
}
