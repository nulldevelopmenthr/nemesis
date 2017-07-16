<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\PhpSpec\Definition\PHP\Methods;

use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\LetMethod;
use NullDev\Skeleton\PhpSpec\Definition\PHP\Methods\LetMethodFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class LetMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LetMethodFactory::class);
    }

    public function it_will_create_let_method_instance(ImprovedClassSource $classSource)
    {
        $classSource->getConstructorParameters()->shouldBeCalled()->willReturn([]);
        $classSource->getParentFullName()->shouldBeCalled()->willReturn(null);
        $this->create($classSource)->shouldReturnAnInstanceOf(LetMethod::class);
    }
}
