<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\CustomMethod;
use PhpSpec\ObjectBehavior;

class CustomMethodSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($name = 'doSomething', [], ['return 1;']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CustomMethod::class);
        $this->shouldImplement(Method::class);
    }
}
