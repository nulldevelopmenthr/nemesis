<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\BoundedContext;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\BoundedContext\BoundedContextConfigFactory
 * @group  integration
 */
class BoundedContextConfigFactoryTest extends TestCase
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
        $name      = new ContextName('Webshop');
        $namespace = new ContextNamespace('MyCompany\Webshop');

        self::assertInstanceOf(
            BoundedContextConfig::class, $this->boundedContextConfigFactory->create($name, $namespace)
        );
    }

    public function testCreateFromArray()
    {
        $name  = 'Webshop';
        $input = [
            'namespace' => 'MyCompany\Webshop\Buyers',
            'classes'   => [
                'id'         => 'MyCompany\Webshop\Buyers\Core\BuyerId',
                'model'      => 'MyCompany\Webshop\Buyers\Domain\BuyerModel',
                'repository' => 'MyCompany\Webshop\Buyers\Domain\BuyerRepository',
                'handler'    => 'MyCompany\Webshop\Buyers\Application\BuyersCommandHandler',
                'entities'   => [],
                'commands'   => [],
                'events'     => [],
            ],
        ];

        self::assertInstanceOf(
            BoundedContextConfig::class, $this->boundedContextConfigFactory->createFromArray($name, $input)
        );
    }
}
