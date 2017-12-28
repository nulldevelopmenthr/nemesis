<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestGetterMethodFactory;
use PhpSpec\ObjectBehavior;

class TestGetterMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestGetterMethodFactory::class);
    }
}
