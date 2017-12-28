<?php

declare(strict_types=1);

namespace Tests\NullDev\Nemesis\Config;

use NullDev\Nemesis\Config\Config;
use NullDev\Nemesis\Config\ConfigFactory;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\Nemesis\Config\ConfigFactory
 * @group  integration
 */
class ConfigFactoryTest extends ContainerSupportedTestCase
{
    /** @var ConfigFactory */
    private $configFactory;

    public function setUp(): void
    {
        $this->configFactory = $this->getService(ConfigFactory::class);
    }

    public function testItReturnsConfigOut(): void
    {
        self::assertInstanceOf(Config::class, $this->configFactory->create());
    }
}
