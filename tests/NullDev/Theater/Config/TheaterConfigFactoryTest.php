<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\Config;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;
use NullDev\Theater\Config\TheaterConfig;
use NullDev\Theater\Config\TheaterConfigFactory;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Theater\Config\TheaterConfigFactory
 * @group  integration
 */
class TheaterConfigFactoryTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var BoundedContextConfigFactory */
    private $boundedContextConfigFactory;
    /** @var TheaterConfigFactory */
    private $theaterConfigFactory;

    public function setUp()
    {
        $this->boundedContextConfigFactory = new BoundedContextConfigFactory(new NamingStrategyFactory());
        $this->theaterConfigFactory        = new TheaterConfigFactory($this->boundedContextConfigFactory);
    }

    public function testCreateFromArray()
    {
        $input = [
            'contexts' => [
                'Buyer' => [
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
                ],
            ],
        ];

        self::assertInstanceOf(TheaterConfig::class, $this->theaterConfigFactory->createFromArray($input));
    }
}
