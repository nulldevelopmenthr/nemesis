<?php

declare(strict_types=1);

namespace spec\Nesto\Application;

use Nesto\Application\MiroCommandHandler;
use Nesto\Domain\MiroRepository;
use PhpSpec\ObjectBehavior;

class MiroCommandHandlerSpec extends ObjectBehavior
{
    public function let(MiroRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MiroCommandHandler::class);
    }

    public function it_should_expose_constructor_arguments_via_getters()
    {
    }
}
