<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestDateTimeValueObjectFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestDateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestDateTimeValueObjectMiddleware;
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
