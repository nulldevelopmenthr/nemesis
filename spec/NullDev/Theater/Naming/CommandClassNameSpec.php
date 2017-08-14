<?php

declare(strict_types=1);

namespace spec\NullDev\Theater\Naming;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Theater\Naming\CommandClassName;
use PhpSpec\ObjectBehavior;

class CommandClassNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('CreateWebshop', 'MyCompany\Webshop\Domain\Command');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommandClassName::class);
        $this->shouldHaveType(ClassType::class);
    }
}
