<?php

declare(strict_types=1);

namespace spec\NullDev\PHPUnitSkeleton\Definition\PHP\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class TestNothingMethodSpec extends ObjectBehavior
{
    public function let(ImprovedClassSource $subjectUnderTest)
    {
        $this->beConstructedWith($subjectUnderTest);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestNothingMethod::class);
    }
}
