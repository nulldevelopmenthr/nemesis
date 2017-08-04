<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\File;

use NullDev\Skeleton\File\FileResource;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class FileResourceSpec extends ObjectBehavior
{
    public function let(ImprovedClassSource $classSource)
    {
        $this->beConstructedWith($fileName = '/var/www/somewhere/src/Namespace/ClassName.php', $classSource);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(FileResource::class);
    }

    public function it_returns_class_source(ImprovedClassSource $classSource)
    {
        $this->getClassSource()->shouldReturn($classSource);
    }

    public function it_returns_file_name()
    {
        $this->getFileName()->shouldReturn('/var/www/somewhere/src/Namespace/ClassName.php');
    }
}
