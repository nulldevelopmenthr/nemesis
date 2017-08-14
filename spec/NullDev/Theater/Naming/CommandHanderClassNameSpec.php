<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Theater\Naming\CommandHanderClassName;
use PhpSpec\ObjectBehavior;

class CommandHanderClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('WebshopCommandHandler', 'MyCompany\Webshop\Application');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommandHanderClassName::class);
        $this->shouldHaveType(ClassType::class);
    }
}
