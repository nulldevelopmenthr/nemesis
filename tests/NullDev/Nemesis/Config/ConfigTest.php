<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\Config;

use NullDev\Nemesis\Config\Config;
use NullDev\Skeleton\Path\Psr4Path;
use NullDev\Skeleton\Path\SpecPsr4Path;
use NullDev\Skeleton\Path\TestPsr4Path;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\Nemesis\Config\Config
 * @group  integration
 */
class ConfigTest extends ContainerSupportedTestCase
{
    /** @var Config */
    private $config;

    public function setUp(): void
    {
        $this->config = $this->getService(Config::class);
    }

    public function testGetSourceCodePaths(): void
    {
        $expected = [
            new Psr4Path('src/', ''),
        ];

        self::assertEquals($expected, $this->config->getSourceCodePaths());
    }

    public function testGetSpecPaths(): void
    {
        $expected = [
            new SpecPsr4Path('spec/', 'spec\\'),
        ];

        self::assertEquals($expected, $this->config->getSpecPaths());
    }

    public function testGetTestPaths(): void
    {
        $expected = [
            new TestPsr4Path('tests/', 'tests\\'),
        ];

        self::assertEquals($expected, $this->config->getTestPaths());
    }

    public function testGetPaths(): void
    {
        $expected = [
            new TestPsr4Path('tests/', 'tests\\'),
            new SpecPsr4Path('spec/', 'spec\\'),
            new Psr4Path('src/', ''),
        ];

        self::assertEquals($expected, $this->config->getPaths());
    }

    public function testGetTestsNamespace(): void
    {
        self::assertEquals('tests', $this->config->getTestsNamespace());
    }

    public function testGetBaseTestClassName(): void
    {
        self::assertEquals('PHPUnit\Framework\TestCase', $this->config->getBaseTestClassName());
    }
}
