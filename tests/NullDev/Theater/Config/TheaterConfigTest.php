<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\Config;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\Config\TheaterConfig;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Theater\Config\TheaterConfig
 * @group  unit
 */
class TheaterConfigTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|BoundedContextConfig */
    private $firstContext;
    /** @var MockInterface|BoundedContextConfig */
    private $secondContext;
    /** @var TheaterConfig */
    private $theaterConfig;

    public function setUp()
    {
        $this->firstContext = Mockery::mock(BoundedContextConfig::class);
        $this->firstContext->shouldReceive('getName')->andReturn(new ContextName('Buyer'));

        $this->secondContext = Mockery::mock(BoundedContextConfig::class);
        $this->secondContext->shouldReceive('getName')->andReturn(new ContextName('SecondHand'));

        $this->theaterConfig = new TheaterConfig([$this->firstContext, $this->secondContext]);
    }

    public function testGetContexts()
    {
        self::assertEquals([$this->firstContext, $this->secondContext], $this->theaterConfig->getContexts());
    }

    public function testHasContextByName()
    {
        self::assertTrue($this->theaterConfig->hasContextByName(new ContextName('Buyer')));
    }

    public function testHasContextByNameWhenContextNotFound()
    {
        self::assertFalse($this->theaterConfig->hasContextByName(new ContextName('NewOne')));
    }

    public function testGetContextByName()
    {
        self::assertEquals($this->firstContext, $this->theaterConfig->getContextByName(new ContextName('Buyer')));
    }

    public function testGetContextByNameReturnsNullWhenNoContextFound()
    {
        self::assertNull($this->theaterConfig->getContextByName(new ContextName('NewOne')));
    }

    public function testToArray()
    {
        $buyerContextData = [
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

        $secondContextData = [
            'namespace' => 'MyCompany\Webshop\SecondHand',
            'classes'   => [
                'id'         => 'MyCompany\Webshop\SecondHand\Core\SecondHandId',
                'model'      => 'MyCompany\Webshop\SecondHand\Domain\SecondHandModel',
                'repository' => 'MyCompany\Webshop\SecondHand\Domain\SecondHandRepository',
                'handler'    => 'MyCompany\Webshop\SecondHand\Application\SecondHandCommandHandler',
                'entities'   => [],
                'commands'   => [],
                'events'     => [],
            ],
        ];

        $this->firstContext->shouldReceive('toArray')->andReturn($buyerContextData);
        $this->secondContext->shouldReceive('toArray')->andReturn($secondContextData);

        $expected = [
            'contexts' => [
                'Buyer'      => $buyerContextData,
                'SecondHand' => $secondContextData,
            ],
        ];

        self::assertEquals($expected, $this->theaterConfig->toArray());
    }
}
