<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleCollectionGenerator;
use PhpSpec\ObjectBehavior;

class SimpleCollectionGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SimpleCollectionGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
