<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\File;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\File\FileFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\File\FileFactory
 * @group  todo
 */
class FileFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|Config */
    private $config;
    /** @var FileFactory */
    private $sut;

    public function setUp()
    {
        $this->config = Mockery::mock(Config::class);
        $this->sut    = new FileFactory($this->config);
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetPath()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateOutputResource()
    {
        $this->markTestSkipped('Skipping');
    }
}
