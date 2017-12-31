<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSimpleEntityFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleEntityGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSimpleEntityMiddleware;
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
