<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHPUnit;

use NullDev\Skeleton\Definition\PHPUnit\CoversComment;
use PhpSpec\ObjectBehavior;

class CoversCommentSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Vendor\Package\ClassName');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CoversComment::class);
    }
}
