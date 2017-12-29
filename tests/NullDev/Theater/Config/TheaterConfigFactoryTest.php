<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\Config;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\BoundedContext\BoundedContextConfigFactory;
use NullDev\Theater\Config\TheaterConfig;
use NullDev\Theater\Config\TheaterConfigFactory;
use NullDev\Theater\NamingStrategy\NamingStrategyFactory;
use NullDev\Theater\ReadSide\ReadSideConfigFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\Config\TheaterConfigFactory
 * @group  integration
 */
class TheaterConfigFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var BoundedContextConfigFactory */
    private $boundedContextConfigFactory;
    /** @var ReadSideConfigFactory */
    private $readSideConfigFactory;
    /** @var TheaterConfigFactory */
    private $theaterConfigFactory;

    public function setUp()
    {
        $this->boundedContextConfigFactory = new BoundedContextConfigFactory(new NamingStrategyFactory());
        $this->readSideConfigFactory       = new ReadSideConfigFactory();
        $this->theaterConfigFactory        = new TheaterConfigFactory(
            $this->boundedContextConfigFactory,
            $this->readSideConfigFactory
        );
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
            'reads' => [
                'BuyerRead' => [
                    'namespace'      => 'MyCompany\Webshop\Buyers',
                    'implementation' => 'DoctrineORM',
                    'classes'        => [
                        'entity'     => 'MyCompany\Webshop\Buyers\BuyerReadEntity',
                        'repository' => 'MyCompany\Webshop\Buyers\BuyerReadRepository',
                        'projector'  => 'MyCompany\Webshop\Buyers\BuyerReadProjector',
                        'factory'    => 'MyCompany\Webshop\Buyers\BuyerReadFactory',
                    ],
                    'properties' => [
                        'firstName' => 'string',
                        'createdAt' => 'DateTime',
                    ],
                ],
                'SecondHandRead' => [
                    'namespace'      => 'MyCompany\Webshop\SecondHand',
                    'implementation' => 'Elasticsearch',
                    'classes'        => [
                        'entity'     => 'MyCompany\Webshop\SecondHand\SecondHandReadEntity',
                        'repository' => 'MyCompany\Webshop\SecondHand\SecondHandReadRepository',
                        'projector'  => 'MyCompany\Webshop\SecondHand\SecondHandReadProjector',
                    ],
                    'properties' => [
                        'age' => 'int',
                    ],
                ],
            ],
        ];

        self::assertInstanceOf(TheaterConfig::class, $this->theaterConfigFactory->createFromArray($input));
    }
}
