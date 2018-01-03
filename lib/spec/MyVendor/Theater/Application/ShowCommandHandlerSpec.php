<?php

declare(strict_types=1);

namespace spec\MyVendor\Theater\Application;

use Broadway\CommandHandling\SimpleCommandHandler;
use MyVendor\Theater\Application\ShowCommandHandler;
use MyVendor\Theater\Application\ShowRepository;
use PhpSpec\ObjectBehavior;

class ShowCommandHandlerSpec extends ObjectBehavior
{
    public function let(ShowRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ShowCommandHandler::class);
        $this->shouldHaveType(SimpleCommandHandler::class);
    }
}
