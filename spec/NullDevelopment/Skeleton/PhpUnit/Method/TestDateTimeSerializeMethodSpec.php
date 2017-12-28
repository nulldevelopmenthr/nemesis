<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeSerializeMethod;
use PhpSpec\ObjectBehavior;

class TestDateTimeSerializeMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeSerializeMethod::class);
    }
}
