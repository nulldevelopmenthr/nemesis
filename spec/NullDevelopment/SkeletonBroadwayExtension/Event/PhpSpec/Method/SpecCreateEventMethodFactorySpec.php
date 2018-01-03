<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method;

use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method\SpecCreateEventMethodFactory;
use NullDevelopment\SkeletonPhpSpecExtension\PhpSpecMethodFactory;
use PhpSpec\ObjectBehavior;

class SpecCreateEventMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecCreateEventMethodFactory::class);
        $this->shouldImplement(PhpSpecMethodFactory::class);
    }
}
