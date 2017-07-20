<?php

declare(strict_types=1);

namespace spec\NullDev\PHPUnitSkeleton;

use NullDev\Nemesis\Config\Config;
use NullDev\PHPUnitSkeleton\PHPUnit5TestGenerator;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PhpSpec\ObjectBehavior;

class PHPUnit5TestGeneratorSpec extends ObjectBehavior
{
    public function let(ClassSourceFactory $classSourceFactory, Config $config)
    {
        $this->beConstructedWith($classSourceFactory, $config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PHPUnit5TestGenerator::class);
    }
}
