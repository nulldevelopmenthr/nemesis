<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHP;

use NullDev\Skeleton\Definition\PHP\DocComment;
use PhpSpec\ObjectBehavior;

class DocCommentSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DocComment::class);
    }
}
