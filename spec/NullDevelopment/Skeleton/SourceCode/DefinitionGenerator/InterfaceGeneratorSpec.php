<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\InterfaceGenerator;
use PhpSpec\ObjectBehavior;

class InterfaceGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InterfaceGenerator::class);
        $this->shouldImplement(DefinitionGenerator::class);
    }
}
