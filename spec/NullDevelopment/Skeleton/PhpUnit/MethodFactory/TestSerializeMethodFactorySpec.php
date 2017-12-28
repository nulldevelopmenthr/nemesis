<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestSerializeMethodFactory;
use PhpSpec\ObjectBehavior;

class TestSerializeMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSerializeMethodFactory::class);
    }
}
