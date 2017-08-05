<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Path\Readers;

use NullDev\Skeleton\Path\Readers\FinderFactory;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Finder\Finder;

class FinderFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(FinderFactory::class);
    }

    public function it_will_return_new_instance_of_finder()
    {
        $this->create()->shouldReturnAnInstanceOf(Finder::class);
    }
}
