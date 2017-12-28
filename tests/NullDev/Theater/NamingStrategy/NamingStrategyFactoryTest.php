<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\NamingStrategy;

use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\NamingStrategy\DevboardNamingStrategy;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use NullDev\Theater\NamingStrategy\TheaterNamingStrategy;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\NamingStrategy\NamingStrategyFactory
 * @group  integration
 */
class NamingStrategyFactoryTest extends TestCase
{
    /** @var NamingStrategyFactory */
    private $factory;

    public function setUp()
    {
        $this->factory = new NamingStrategyFactory();
    }

    public function testTheater()
    {
        self::assertInstanceOf(
            TheaterNamingStrategy::class,
            $this->factory->theater(new ContextName('Webshop'), new ContextNamespace('MyCompany\Webshop'))
        );
    }

    public function testDevboard()
    {
        self::assertInstanceOf(
            DevboardNamingStrategy::class,
            $this->factory->devboard(new ContextName('Webshop'), new ContextNamespace('MyCompany\Webshop'))
        );
    }
}
