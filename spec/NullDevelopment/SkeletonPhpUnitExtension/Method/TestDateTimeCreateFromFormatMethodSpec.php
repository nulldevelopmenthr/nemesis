<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\Method;

use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeCreateFromFormatMethod;
use PhpSpec\ObjectBehavior;

class TestDateTimeCreateFromFormatMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeCreateFromFormatMethod::class);
    }
}
