<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\CustomMethodGenerator;
use PhpSpec\ObjectBehavior;

class CustomMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CustomMethodGenerator::class);
    }
}
