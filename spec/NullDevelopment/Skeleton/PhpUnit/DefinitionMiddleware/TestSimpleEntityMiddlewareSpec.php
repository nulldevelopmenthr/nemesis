<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleEntityFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleEntityGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSimpleEntityMiddleware;
use PhpSpec\ObjectBehavior;

class TestSimpleEntityMiddlewareSpec extends ObjectBehavior
{
    public function let(TestSimpleEntityFactory $factory, TestSimpleEntityGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleEntityMiddleware::class);
    }
}
