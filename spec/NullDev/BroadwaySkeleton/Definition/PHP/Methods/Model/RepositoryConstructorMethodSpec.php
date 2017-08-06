<?php

declare(strict_types=1);

namespace spec\NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model;

use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpSpec\ObjectBehavior;

class RepositoryConstructorMethodSpec extends ObjectBehavior
{
    public function let(ClassType $classType)
    {
        $this->beConstructedWith($classType);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepositoryConstructorMethod::class);
    }
}
