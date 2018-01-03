<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method;

use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method\TestCreateEventMethodFactory;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitMethodFactory;
use PhpSpec\ObjectBehavior;

class TestCreateEventMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestCreateEventMethodFactory::class);
        $this->shouldImplement(PhpUnitMethodFactory::class);
    }
}
