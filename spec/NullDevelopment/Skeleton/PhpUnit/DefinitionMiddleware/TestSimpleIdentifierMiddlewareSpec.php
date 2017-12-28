<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleIdentifierFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleIdentifierGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSimpleIdentifierMiddleware;
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
