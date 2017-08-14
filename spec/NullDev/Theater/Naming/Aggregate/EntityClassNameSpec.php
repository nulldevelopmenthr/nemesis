<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming\Aggregate;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Theater\Naming\Aggregate\EntityClassName;
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
        $this->shouldHaveType(ClassType::class);
    }
}
