<?php

declare(strict_types=1);

namespace spec\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethod;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethodFactory;
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
        $this->create($classSource)->shouldReturnAnInstanceOf(LetMethod::class);
    }
}
