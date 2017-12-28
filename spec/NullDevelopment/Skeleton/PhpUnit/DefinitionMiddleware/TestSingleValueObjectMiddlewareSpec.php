<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSingleValueObjectFactory;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSingleValueObjectGenerator;
use NullDevelopment\Skeleton\PhpUnit\DefinitionMiddleware\TestSingleValueObjectMiddleware;
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
