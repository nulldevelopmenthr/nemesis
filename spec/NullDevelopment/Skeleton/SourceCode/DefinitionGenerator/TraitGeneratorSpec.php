<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\TraitGenerator;
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
