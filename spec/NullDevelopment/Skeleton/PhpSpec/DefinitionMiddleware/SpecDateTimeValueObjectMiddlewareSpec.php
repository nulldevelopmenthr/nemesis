<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecDateTimeValueObjectFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecDateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecDateTimeValueObjectMiddleware;
use PhpSpec\ObjectBehavior;

class SpecDateTimeValueObjectMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecDateTimeValueObjectFactory $factory, SpecDateTimeValueObjectGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeValueObjectMiddleware::class);
    }
}
