<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleCollectionFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleCollectionGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSimpleCollectionMiddleware;
use PhpSpec\ObjectBehavior;

class TestSimpleCollectionMiddlewareSpec extends ObjectBehavior
{
    public function let(TestSimpleCollectionFactory $factory, TestSimpleCollectionGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleCollectionMiddleware::class);
    }
}
