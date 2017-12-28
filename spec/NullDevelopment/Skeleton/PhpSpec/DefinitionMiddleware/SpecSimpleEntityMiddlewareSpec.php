<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleEntityFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleEntityGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSimpleEntityMiddleware;
use PhpSpec\ObjectBehavior;

class SpecSimpleEntityMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecSimpleEntityFactory $factory, SpecSimpleEntityGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleEntityMiddleware::class);
    }
}
