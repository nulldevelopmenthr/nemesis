<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming\Aggregate;

use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use PhpSpec\ObjectBehavior;

class RootModelClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('WebshopModel', 'MyCompany\Webshop\Domain');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RootModelClassName::class);
        $this->shouldHaveType(ClassName::class);
    }
}
