<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming\Aggregate;

use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use PhpSpec\ObjectBehavior;

class RootIdClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('WebshopId', 'MyCompany\Webshop\Core');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RootIdClassName::class);
        $this->shouldHaveType(ClassName::class);
    }
}
