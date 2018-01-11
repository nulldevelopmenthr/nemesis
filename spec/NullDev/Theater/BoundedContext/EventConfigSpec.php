<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\BoundedContext;

use NullDev\Theater\BoundedContext\EventConfig;
use NullDev\Theater\Naming\EventClassName;
use NullDevelopment\PhpStructure\DataType\Property;
use PhpSpec\ObjectBehavior;

class EventConfigSpec extends ObjectBehavior
{
    public function let(EventClassName $eventClassName, Property $parameter1)
    {
        $this->beConstructedWith($name = 'BuySomething', $eventClassName, [$parameter1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventConfig::class);
    }

    public function it_exposes_event_name()
    {
        $this->getName()->shouldReturn('BuySomething');
    }

    public function it_exposes_event_class_name(EventClassName $eventClassName)
    {
        $this->getEventClassName()->shouldReturn($eventClassName);
    }

    public function it_exposes_event_parameters(Property $parameter1)
    {
        $this->getParameters()->shouldReturn([$parameter1]);
    }
}
