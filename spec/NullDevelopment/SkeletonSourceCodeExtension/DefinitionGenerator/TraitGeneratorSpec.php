<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\TraitGenerator;
use PhpSpec\ObjectBehavior;

class TraitGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TraitGenerator::class);
    }
}
