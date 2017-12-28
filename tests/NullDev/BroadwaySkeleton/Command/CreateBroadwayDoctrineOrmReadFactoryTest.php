<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory
 * @group  todo
 */
class CreateBroadwayDoctrineOrmReadFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassType */
    private $factoryClassType;
    /** @var CreateBroadwayDoctrineOrmReadFactory */
    private $sut;

    public function setUp()
    {
        $this->factoryClassType = Mockery::mock(ClassType::class);
        $this->sut              = new CreateBroadwayDoctrineOrmReadFactory($this->factoryClassType);
    }

    public function testGetFactoryClassType()
    {
        self::assertEquals($this->factoryClassType, $this->sut->getFactoryClassType());
    }
}
