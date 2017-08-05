<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Path\Readers;

use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\Path\Readers\FinderFactory;
use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use PhpSpec\ObjectBehavior;

class SourceCodePathReaderSpec extends ObjectBehavior
{
    public function let(FinderFactory $finderFactory, Config $config)
    {
        $this->beConstructedWith($finderFactory, $config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SourceCodePathReader::class);
    }
}
