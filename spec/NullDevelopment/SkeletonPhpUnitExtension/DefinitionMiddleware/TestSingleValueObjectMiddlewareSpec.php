<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestSingleValueObjectFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSingleValueObjectGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestSingleValueObjectMiddleware;
use PhpSpec\ObjectBehavior;

class TestSingleValueObjectMiddlewareSpec extends ObjectBehavior
{
    public function let(TestSingleValueObjectFactory $factory, TestSingleValueObjectGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSingleValueObjectMiddleware::class);
    }
}
