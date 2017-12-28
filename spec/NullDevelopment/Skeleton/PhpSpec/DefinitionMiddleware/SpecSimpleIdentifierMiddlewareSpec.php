<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleIdentifierFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleIdentifierGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSimpleIdentifierMiddleware;
use PhpSpec\ObjectBehavior;

class SpecSimpleIdentifierMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecSimpleIdentifierFactory $factory, SpecSimpleIdentifierGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleIdentifierMiddleware::class);
    }
}
