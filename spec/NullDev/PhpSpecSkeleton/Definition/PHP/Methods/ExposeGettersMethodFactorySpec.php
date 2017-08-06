<?php

declare(strict_types=1);

namespace spec\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethod;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethodFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class ExposeGettersMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExposeGettersMethodFactory::class);
    }

    public function it_will_create_expose_method_instance(ImprovedClassSource $classSource)
    {
        $classSource->getMethods()->shouldBeCalled()->willReturn([]);

        $this->create($classSource)->shouldReturnAnInstanceOf(ExposeGettersMethod::class);
    }
}
