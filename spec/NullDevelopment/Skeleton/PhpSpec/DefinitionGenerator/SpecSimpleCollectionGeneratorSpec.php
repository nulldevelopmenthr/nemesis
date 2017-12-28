<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleCollectionGenerator;
use PhpSpec\ObjectBehavior;

class SpecSimpleCollectionGeneratorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleCollectionGenerator::class);
    }
}
