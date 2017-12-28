<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeDeserializeMethodFactory;
use PhpSpec\ObjectBehavior;

class TestDateTimeDeserializeMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeDeserializeMethodFactory::class);
    }
}
