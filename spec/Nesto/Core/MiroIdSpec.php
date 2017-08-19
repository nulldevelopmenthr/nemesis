<?php

declare(strict_types=1);

namespace spec\Nesto\Core;

use Nesto\Core\MiroId;
use PhpSpec\ObjectBehavior;

class MiroIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($id = 'id');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MiroId::class);
    }

    public function it_should_expose_constructor_arguments_via_getters()
    {
        $this->getId()->shouldReturn('id');
    }
}
