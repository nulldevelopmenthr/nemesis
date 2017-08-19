<?php

declare(strict_types=1);

namespace spec\Nesto\Domain;

use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use Nesto\Domain\MiroRepository;
use PhpSpec\ObjectBehavior;

class MiroRepositorySpec extends ObjectBehavior
{
    public function let(EventStore $eventStore, EventBus $eventBus)
    {
        $this->beConstructedWith($eventStore, $eventBus, $eventStreamDecorators = []);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MiroRepository::class);
        $this->shouldHaveType(EventSourcingRepository::class);
    }
}
