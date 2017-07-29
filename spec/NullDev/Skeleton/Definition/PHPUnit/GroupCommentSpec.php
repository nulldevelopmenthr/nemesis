<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Definition\PHPUnit;

use NullDev\Skeleton\Definition\PHPUnit\GroupComment;
use PhpSpec\ObjectBehavior;

class GroupCommentSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($groupName = 'unit');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GroupComment::class);
    }

    public function it_exposes_group_name()
    {
        $this->getGroupName()->shouldReturn('unit');
    }

    public function it_can_be_cast_to_string()
    {
        $this->__toString()->shouldReturn('* @group unit');
    }
}
