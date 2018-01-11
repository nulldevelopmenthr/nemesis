<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\File;

use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\Path\Psr0Path;
use PhpSpec\ObjectBehavior;

class FileFactorySpec extends ObjectBehavior
{
    public function let(Config $config, Psr0Path $path1)
    {
        $config->getPaths()->willReturn([$path1]);
        $this->beConstructedWith($config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(FileFactory::class);
    }
}
