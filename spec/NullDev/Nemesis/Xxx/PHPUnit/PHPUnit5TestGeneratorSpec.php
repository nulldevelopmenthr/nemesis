<?php

declare(strict_types=1);

namespace spec\NullDev\Nemesis\Xxx\PHPUnit;

use NullDev\Nemesis\Xxx\PHPUnit\PHPUnit5TestGenerator;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PhpSpec\ObjectBehavior;

class PHPUnit5TestGeneratorSpec extends ObjectBehavior
{
    public function let(ClassSourceFactory $classSourceFactory)
    {
        $this->beConstructedWith($classSourceFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PHPUnit5TestGenerator::class);
    }
}
