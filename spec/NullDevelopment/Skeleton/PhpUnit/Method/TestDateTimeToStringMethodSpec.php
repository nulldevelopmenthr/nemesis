<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeToStringMethod;
use PhpSpec\ObjectBehavior;

class TestDateTimeToStringMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeToStringMethod::class);
    }
}
