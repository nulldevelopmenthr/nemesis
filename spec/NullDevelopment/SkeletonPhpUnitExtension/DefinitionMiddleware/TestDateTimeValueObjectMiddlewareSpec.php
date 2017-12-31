<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpUnitExtension\DefinitionFactory\TestDateTimeValueObjectFactory;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestDateTimeValueObjectGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionMiddleware\TestDateTimeValueObjectMiddleware;
use PhpSpec\ObjectBehavior;

class TestDateTimeValueObjectMiddlewareSpec extends ObjectBehavior
{
    public function let(TestDateTimeValueObjectFactory $factory, TestDateTimeValueObjectGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeValueObjectMiddleware::class);
    }
}
