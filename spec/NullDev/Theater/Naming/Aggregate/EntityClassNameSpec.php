<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming\Aggregate;

use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use PhpSpec\ObjectBehavior;

class EntityClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('SomeEntity', 'MyCompany\Webshop\Domain');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EntityClassName::class);
        $this->shouldHaveType(ClassName::class);
    }
}
