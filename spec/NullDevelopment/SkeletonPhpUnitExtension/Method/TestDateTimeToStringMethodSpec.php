<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\Method;

use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeToStringMethod;
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
