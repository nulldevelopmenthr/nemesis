<?php

declare(strict_types=1);

namespace spec\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use PhpSpec\ObjectBehavior;

class InitializableMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($shouldHaveTypes = []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InitializableMethod::class);
        $this->shouldHaveType(Method::class);
    }
}
