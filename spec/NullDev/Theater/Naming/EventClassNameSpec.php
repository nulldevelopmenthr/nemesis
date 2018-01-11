<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming;

use NullDev\Theater\Naming\EventClassName;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use PhpSpec\ObjectBehavior;

class EventClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('WebshopCreated', 'MyCompany\Webshop\Domain\Event');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventClassName::class);
        $this->shouldHaveType(ClassName::class);
    }
}
