<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\BoundedContext;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Theater\BoundedContext\BoundedContextConfigFactory
 * @group  integration
 */
class BoundedContextConfigFactoryTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var NamingStrategyFactory */
    private $namingStrategyFactory;
    /** @var BoundedContextConfigFactory */
    private $boundedContextConfigFactory;

    public function setUp()
    {
        $this->namingStrategyFactory       = new NamingStrategyFactory();
        $this->boundedContextConfigFactory = new BoundedContextConfigFactory($this->namingStrategyFactory);
    }

    public function testCreate()
    {
        $name      = 'Webshop';
        $namespace = 'MyCompany\Webshop';

        self::assertInstanceOf(
            BoundedContextConfig::class,
            $this->boundedContextConfigFactory->create($name, $namespace)
        );
    }
}
