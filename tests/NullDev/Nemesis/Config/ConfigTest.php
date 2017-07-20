<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\Config;

use NullDev\Nemesis\Config\Config;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\Config\Config
 * @group nemesis
 */
class ConfigTest extends PHPUnit_Framework_TestCase
{
    /** @var Config */
    private $config;

    public function setUp(): void
    {
        $this->config = new Config([], [], '', '');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
