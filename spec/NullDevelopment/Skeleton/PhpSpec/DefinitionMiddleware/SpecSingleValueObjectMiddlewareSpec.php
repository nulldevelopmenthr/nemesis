<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSingleValueObjectFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSingleValueObjectGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSingleValueObjectMiddleware;
use PhpSpec\ObjectBehavior;

class SpecSingleValueObjectMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecSingleValueObjectFactory $factory, SpecSingleValueObjectGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSingleValueObjectMiddleware::class);
    }
}
