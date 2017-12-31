<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDeserializeMethodFactory;
use PhpSpec\ObjectBehavior;

class TestDeserializeMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDeserializeMethodFactory::class);
    }
}
