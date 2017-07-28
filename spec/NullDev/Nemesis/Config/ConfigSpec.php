<?php

declare(strict_types=1);

namespace spec\NullDev\Nemesis\Config;

use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\Path\Psr4Path;
use NullDev\Skeleton\Path\TestPsr4Path;
use PhpSpec\ObjectBehavior;

class ConfigSpec extends ObjectBehavior
{
    public function let(Psr4Path $psr4Path, TestPsr4Path $testPsr4Path)
    {
        $this->beConstructedWith([$psr4Path], [$testPsr4Path], 'tests', 'PHPUnit_Framework_TestCase');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Config::class);
    }

    public function it_exposes_source_code_paths(Psr4Path $psr4Path)
    {
        $this->getSourceCodePaths()
            ->shouldReturn([$psr4Path]);
    }

    public function it_exposes_test_paths(TestPsr4Path $testPsr4Path)
    {
        $this->getTestPaths()
            ->shouldReturn([$testPsr4Path]);
    }
}
