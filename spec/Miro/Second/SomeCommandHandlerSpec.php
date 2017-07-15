<?php

declare(strict_types=1);

namespace spec\Miro\Second;

use Miro\Second\SomeCommandHandler;
use PhpSpec\ObjectBehavior;

class SomeCommandHandlerSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SomeCommandHandler::class);
    }
}
