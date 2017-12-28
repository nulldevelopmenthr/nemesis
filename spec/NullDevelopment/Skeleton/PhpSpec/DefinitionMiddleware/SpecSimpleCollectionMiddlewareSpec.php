<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware;

use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleCollectionGenerator;
use NullDevelopment\Skeleton\PhpSpec\DefinitionMiddleware\SpecSimpleCollectionMiddleware;
use PhpSpec\ObjectBehavior;

class SpecSimpleCollectionMiddlewareSpec extends ObjectBehavior
{
    public function let(SpecSimpleCollectionFactory $factory, SpecSimpleCollectionGenerator $generator)
    {
        $this->beConstructedWith($factory, $generator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleCollectionMiddleware::class);
    }
}
