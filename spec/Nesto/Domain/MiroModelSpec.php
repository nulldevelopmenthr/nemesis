<?php

declare(strict_types=1);

namespace spec\Nesto\Domain;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Nesto\Domain\MiroModel;
use PhpSpec\ObjectBehavior;

class MiroModelSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MiroModel::class);
        $this->shouldHaveType(EventSourcedAggregateRoot::class);
    }

    public function it_should_expose_constructor_arguments_via_getters()
    {
    }
}
