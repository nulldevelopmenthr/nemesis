<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PhpSpec\ObjectBehavior;

class CommandHandlerClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('WebshopCommandHandler', 'MyCompany\Webshop\Application');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommandHandlerClassName::class);
        $this->shouldHaveType(ClassType::class);
    }
}
