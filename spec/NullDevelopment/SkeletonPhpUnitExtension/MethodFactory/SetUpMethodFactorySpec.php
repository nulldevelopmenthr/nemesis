<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\SetUpMethodFactory;
use PhpSpec\ObjectBehavior;

class SetUpMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SetUpMethodFactory::class);
    }
}
