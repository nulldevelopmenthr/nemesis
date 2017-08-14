<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming\Aggregate;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use PhpSpec\ObjectBehavior;

class RootRepositoryClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('WebshopRepository', 'MyCompany\Webshop\Domain');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RootRepositoryClassName::class);
        $this->shouldHaveType(ClassType::class);
    }
}
