<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecHasPropertyMethodFactory;
use PhpSpec\ObjectBehavior;

class SpecHasPropertyMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecHasPropertyMethodFactory::class);
    }
}
