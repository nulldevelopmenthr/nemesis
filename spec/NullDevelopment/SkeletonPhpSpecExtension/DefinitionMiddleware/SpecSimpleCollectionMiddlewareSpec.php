<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware;

use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecSimpleCollectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleCollectionGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionMiddleware\SpecSimpleCollectionMiddleware;
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
