<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDateTimeCreateFromFormatMethodFactory;
use PhpSpec\ObjectBehavior;

class TestDateTimeCreateFromFormatMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeCreateFromFormatMethodFactory::class);
    }
}
