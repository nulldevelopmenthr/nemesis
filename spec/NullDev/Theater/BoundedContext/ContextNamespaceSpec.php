<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\BoundedContext;

use Exception;
use NullDev\Theater\BoundedContext\ContextNamespace;
use PhpSpec\ObjectBehavior;

class ContextNamespaceSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($namespace = 'MyCompany\User');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ContextNamespace::class);
    }

    public function it_exposes_namespace_via_get_value()
    {
        $this->getValue()->shouldReturn('MyCompany\User');
    }

    public function it_can_be_converted_to_string()
    {
        $this->__toString()->shouldReturn('MyCompany\User');
    }

    public function it_will_throw_exception_if_no_backslash_at_the_end_of_namespace()
    {
        $expectedException = new Exception('Namespace must not end with \\.');

        $this->shouldThrow($expectedException)->during('__construct', ['MyCompany\User\\']);
    }

    public function it_will_throw_exception_if_empty_string_given()
    {
        $expectedException = new Exception('Namespace should not be empty.');

        $this->shouldThrow($expectedException)->during('__construct', ['']);
    }
}
