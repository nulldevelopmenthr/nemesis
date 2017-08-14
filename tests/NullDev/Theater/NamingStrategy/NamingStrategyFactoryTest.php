<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\NamingStrategy;

use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use NullDev\Theater\NamingStrategy\TheaterNamingStrategy;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Theater\NamingStrategy\NamingStrategyFactory
 * @group  todo
 */
class NamingStrategyFactoryTest extends PHPUnit_Framework_TestCase
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
            $this->factory->theater(new ContextName('Webshop'), new ContextNamespace('MyCompany\Webshop\\'))
        );
    }
}
