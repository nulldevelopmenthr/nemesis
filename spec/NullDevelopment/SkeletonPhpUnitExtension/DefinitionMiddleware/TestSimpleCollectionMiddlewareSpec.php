<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleCollectionGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSimpleCollectionMiddleware;
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
