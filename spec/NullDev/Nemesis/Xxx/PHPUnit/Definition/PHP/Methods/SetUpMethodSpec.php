<?php

declare(strict_types=1);

namespace spec\NullDev\Nemesis\Xxx\PHPUnit\Definition\PHP\Methods;

use NullDev\Nemesis\Xxx\PHPUnit\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class SetUpMethodSpec extends ObjectBehavior
{
    public function let(ImprovedClassSource $subjectUnderTest)
    {
        $this->beConstructedWith($subjectUnderTest);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SetUpMethod::class);
    }
}
