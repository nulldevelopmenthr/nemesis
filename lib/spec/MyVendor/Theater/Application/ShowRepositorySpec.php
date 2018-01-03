<?php

declare(strict_types=1);

namespace spec\MyVendor\Theater\Application;

use Broadway\EventSourcing\EventSourcingRepository;
use MyVendor\Theater\Application\ShowRepository;
use PhpSpec\ObjectBehavior;

class ShowRepositorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ShowRepository::class);
        $this->shouldHaveType(EventSourcingRepository::class);
    }
}