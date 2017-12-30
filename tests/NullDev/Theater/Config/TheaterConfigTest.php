<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\Config;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\Config\TheaterConfig;
use NullDev\Theater\ReadSide\ReadSideConfig;
use NullDev\Theater\ReadSide\ReadSideName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\Config\TheaterConfig
 * @group  unit
 */
class TheaterConfigTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|BoundedContextConfig */
    private $firstContext;

    /** @var MockInterface|BoundedContextConfig */
    private $secondContext;

    /** @var MockInterface|ReadSideConfig */
    private $firstReadSide;

    /** @var MockInterface|ReadSideConfig */
    private $secondReadSide;

    /** @var TheaterConfig */
    private $theaterConfig;

    public function setUp()
    {
        $this->firstContext = Mockery::mock(BoundedContextConfig::class);
        $this->firstContext->shouldReceive('getName')->andReturn(new ContextName('Buyer'));

        $this->secondContext = Mockery::mock(BoundedContextConfig::class);
        $this->secondContext->shouldReceive('getName')->andReturn(new ContextName('SecondHand'));

        $this->firstReadSide = Mockery::mock(ReadSideConfig::class);
        $this->firstReadSide->shouldReceive('getName')->andReturn(new ReadSideName('BuyerRead'));

        $this->secondReadSide = Mockery::mock(ReadSideConfig::class);
        $this->secondReadSide->shouldReceive('getName')->andReturn(new ReadSideName('SecondHandRead'));

        $this->theaterConfig = new TheaterConfig(
            [$this->firstContext, $this->secondContext],
            [$this->firstReadSide, $this->secondReadSide]
        );
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

        $buyerReadSideData = [
            'namespace'      => 'MyCompany\Webshop\Buyers',
            'implementation' => 'DoctrineORM',
            'classes'        => [
                'entity'     => 'MyCompany\Webshop\Buyers\BuyerReadEntity',
                'repository' => 'MyCompany\Webshop\Buyers\BuyerReadRepository',
                'projector'  => 'MyCompany\Webshop\Buyers\BuyerReadProjector',
                'factory'    => 'MyCompany\Webshop\Buyers\BuyerReadFactory',
            ],
        ];

        $secondReadSideData = [
            'namespace'      => 'MyCompany\Webshop\SecondHand',
            'implementation' => 'Elasticsearch',
            'classes'        => [
                'entity'     => 'MyCompany\Webshop\SecondHand\SecondHandReadEntity',
                'repository' => 'MyCompany\Webshop\SecondHand\SecondHandReadRepository',
                'projector'  => 'MyCompany\Webshop\SecondHand\SecondHandReadProjector',
            ],
        ];

        $this->firstContext->shouldReceive('toArray')->andReturn($buyerContextData);
        $this->secondContext->shouldReceive('toArray')->andReturn($secondContextData);
        $this->firstReadSide->shouldReceive('toArray')->andReturn($buyerReadSideData);
        $this->secondReadSide->shouldReceive('toArray')->andReturn($secondReadSideData);

        $expected = [
            'contexts' => [
                'Buyer'      => $buyerContextData,
                'SecondHand' => $secondContextData,
            ],
            'reads' => [
                'BuyerRead'      => $buyerReadSideData,
                'SecondHandRead' => $secondReadSideData,
            ],
        ];

        self::assertEquals($expected, $this->theaterConfig->toArray());
    }
}
