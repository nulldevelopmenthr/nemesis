<?php

declare(strict_types=1);

namespace spec\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethod;
use PhpSpec\ObjectBehavior;

class ExposeGettersMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExposeGettersMethod::class);
    }
}
