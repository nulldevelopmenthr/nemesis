<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataType\Visibility;
use PhpSpec\ObjectBehavior;

class VisibilitySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('private');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Visibility::class);
    }
}
