<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\File;

use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\File\FileFactory;
use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\Path\Psr0Path;
use NullDev\Skeleton\Source\ImprovedClassSource;
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

    public function it_will_create_file_resource(ImprovedClassSource $classSource, $path1)
    {
        $classSource->getFullName()->willReturn('Namespace\\ClassName');
        $path1->belongsTo('Namespace\\ClassName')->willReturn(true);

        $this->create($classSource)->shouldReturnAnInstanceOf(FileResource::class);
    }
}
