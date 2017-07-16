<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\PhpSpec\Definition\PHP\Methods;

use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethod;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\ExposeConstructorArgumentsAsGettersMethodFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class ExposeConstructorArgumentsAsGettersMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ExposeConstructorArgumentsAsGettersMethodFactory::class);
    }

    public function it_will_create_expose_method_instance(ImprovedClassSource $classSource)
    {
        $classSource->getConstructorParameters()->shouldBeCalled()->willReturn([]);
        $classSource->getParentFullName()->shouldBeCalled()->willReturn(null);

        $this->create($classSource)->shouldReturnAnInstanceOf(ExposeConstructorArgumentsAsGettersMethod::class);
    }
}
