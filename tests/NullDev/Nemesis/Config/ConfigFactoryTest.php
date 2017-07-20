<?php

declare(strict_types=1);

namespace tests\NullDev\Nemesis\Config;

use NullDev\Nemesis\Config\ConfigFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Nemesis\Config\ConfigFactory
 * @group  nemesis
 */
class ConfigFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var ConfigFactory */
    private $configFactory;

    public function setUp(): void
    {
        $this->configFactory = new ConfigFactory();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
