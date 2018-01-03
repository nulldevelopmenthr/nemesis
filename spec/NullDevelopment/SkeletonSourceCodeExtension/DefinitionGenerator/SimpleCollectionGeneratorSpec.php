<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator\SimpleCollectionGenerator;
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
