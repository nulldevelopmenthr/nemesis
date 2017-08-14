<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\File;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\File\FileFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\File\FileFactory
 * @group  todo
 */
class FileFactoryTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var \Mockery\MockInterface|Config */
    private $config;
    /** @var FileFactory */
    private $fileFactory;

    public function setUp()
    {
        $this->config      = Mockery::mock(Config::class);
        $this->fileFactory = new FileFactory($this->config);
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetPath()
    {
        $this->markTestSkipped('Skipping');
    }
}
