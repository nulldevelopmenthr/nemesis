<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\ReadSide;

use Exception;
use NullDev\Theater\ReadSide\ReadSideImplementation;
use PhpSpec\ObjectBehavior;

class ReadSideImplementationSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(ReadSideImplementation::DOCTRINE_ORM);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ReadSideImplementation::class);
    }

    public function it_returns_implementation_type()
    {
        $this->getValue()->shouldReturn(ReadSideImplementation::DOCTRINE_ORM);
    }

    public function it_will_throw_exception_if_unsupported_value_given()
    {
        $expectedException = new Exception('Only DoctrineORM and Elasticsearch are supported');

        $this->shouldThrow($expectedException)->during('__construct', ['']);
    }
}
